<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {

            $query->where(function ($q) use ($request) {

                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');

            });

        }

        if ($request->filled('role')) {

            $query->where('role', $request->role);

        }

        if ($request->filled('status')) {

            $query->where('status', $request->status);

        }

        $users = $query
                    ->latest()
                    ->paginate(10)
                    ->withQueryString();

        $statistics = [

            'total' => User::count(),

            'aktif' => User::where('status', 'aktif')->count(),

            'nonaktif' => User::where('status', 'nonaktif')->count(),

            'admin' => User::where('role', 'admin')->count(),

            'user' => User::where('role', 'petugas')->count(),

        ];

        return view(
            'users.index',
            compact(
                'users',
                'statistics'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|string|max:255',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|min:6|confirmed',

            'role' => 'required|in:admin,user',

            'status' => 'required|in:aktif,nonaktif',

        ]);

        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make($request->password),

            'role' => $request->role,

            'status' => $request->status,

        ]);

        return back()->with(
            'success',
            'User berhasil ditambahkan.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show(User $user)
    {
        return response()->json($user);
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, User $user)
    {
        $request->validate([

            'name' => 'required|string|max:255',

            'email' => 'required|email|unique:users,email,' . $user->id,

            'role' => 'required|in:admin,user',

            'status' => 'required|in:aktif,nonaktif',

        ]);

        $user->update([

            'name' => $request->name,

            'email' => $request->email,

            'role' => $request->role,

            'status' => $request->status,

        ]);

        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'Data user berhasil diperbarui.'
            );
    }

    /*
|--------------------------------------------------------------------------
| RESET PASSWORD
|--------------------------------------------------------------------------
*/

public function resetPassword(Request $request, User $user)
{
    $request->validate([

        'password' => 'required|min:6|confirmed',

    ]);

    $user->update([

        'password' => Hash::make($request->password),

    ]);

    return back()->with(
        'success',
        'Password berhasil diperbarui.'
    );
}

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy(User $user)
    {
        if ($user->id == auth()->id()) {

            return back()->with(
                'error',
                'Anda tidak dapat menghapus akun sendiri.'
            );

        }

        $user->delete();

        return back()->with(
            'success',
            'User berhasil dihapus.'
        );
    }
}