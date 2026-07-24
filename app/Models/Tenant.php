<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{

    public function contracts()
{
    return $this->hasMany(Contract::class);
}

    protected $fillable = [

        'nama_tenant',

        'nama_pic',

        'no_hp_pic',

        'instansi',

        'jenis_layanan',

        'status_pks',

        'nomor_kontrak',

        'tanggal_pks',

        'masa_mulai',

        'masa_berakhir',

        'arsip',
        
        'lokasi_ruangan',

        'rak',

        'deleted'

    ];

}