<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiKas extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transaksi_kas';

    protected $guarded = [];

    public function dari_jenis_kas()
	{
		return $this->belongsTo(\App\Models\JenisKas::class, 'dari_jenis_kas_id', 'id');
    }	
	public function untuk_jenis_kas()
	{
		return $this->belongsTo(\App\Models\JenisKas::class, 'untuk_jenis_kas_id', 'id');
    }	
	public function jenis_akun()
	{
		return $this->belongsTo(\App\Models\JenisAkun::class, 'jenis_akun_id', 'id');
    }
}
