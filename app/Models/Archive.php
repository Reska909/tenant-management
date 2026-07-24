<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable = [

        'contract_id',

        'alasan',

        'archived_at',

        'deleted',

        'lokasi_ruangan',

        'rak'

    ];

    protected $casts = [

        'archived_at' => 'datetime'

    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}