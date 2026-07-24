<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [

        'tenant_id',

        'nomor_kontrak',

        'judul_kontrak',

        'tanggal_kontrak',

        'mulai',

        'selesai',

        'nilai_kontrak',

        'file_kontrak',

        'keterangan',

        'status',

        'deleted'

    ];

    protected $casts = [

        'tanggal_kontrak' => 'date',

        'mulai' => 'date',

        'selesai' => 'date',

        'deleted' => 'boolean',

    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function archive()
    {
        return $this->hasOne(Archive::class)
                ->where('deleted', false);
    }

    /*
    |--------------------------------------------------------------------------
    | STATUS KONTRAK
    |--------------------------------------------------------------------------
    */

    public function getStatusKontrakAttribute()
    {
        if (!$this->selesai) {
            return "Tidak Ada";
        }

        $hari = $this->sisa_hari;

        if ($hari < 0) {
            return "Berakhir";
        }

        if ($hari <= 30) {
            return "Hampir Berakhir";
        }

        return "Aktif";
    }

    /*
    |--------------------------------------------------------------------------
    | SISA HARI
    |--------------------------------------------------------------------------
    */

    public function getSisaHariAttribute()
    {
        if (!$this->selesai) {
            return null;
        }

        $today = Carbon::today();

        $endDate = Carbon::parse($this->selesai)->startOfDay();

        return (int) $today->diffInDays($endDate, false);
    }

    /*
    |--------------------------------------------------------------------------
    | DURASI KONTRAK
    |--------------------------------------------------------------------------
    */

    public function getDurasiKontrakAttribute()
    {
        if (!$this->mulai || !$this->selesai) {
            return null;
        }

        return Carbon::parse($this->mulai)
            ->diffInDays(Carbon::parse($this->selesai));
    }
}