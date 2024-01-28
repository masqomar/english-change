<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanLabaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:laporan-laba.index')->only('index', 'show');
        $this->middleware('permission:laporan-laba.create')->only('create', 'store');
        $this->middleware('permission:laporan-laba.edit')->only('edit', 'update');
        $this->middleware('permission:laporan-laba.delete')->only('delete');
    }

    public function index()
    {
        $akunPendapatan = DB::table('jenis_akun')
        ->leftJoin('transaksi_kas', 'transaksi_kas.jenis_akun_id', 'jenis_akun.id')
        ->select(DB::raw("SUM(jumlah) as total_akun_debet"), 'jenis_akun.kode_akun', 'jenis_akun.nama_akun', 'jenis_akun.id', 'jenis_akun.type')
        ->groupBy('jenis_akun.kode_akun', 'jenis_akun.nama_akun', 'jenis_akun.id', 'jenis_akun.type')
        ->where('jenis_akun.status', 1)
        ->where('laba_rugi', 'PENDAPATAN')
        ->havingRaw('CHAR_LENGTH(kode_akun) > 1')
        ->orderByRaw('LPAD(kode_akun, 1, 0) ASC')
        ->orderByRaw('LPAD(kode_akun, 5, 1) ASC')
        ->get();

        $akunBiaya = DB::table('jenis_akun')
        ->leftJoin('transaksi_kas', 'transaksi_kas.jenis_akun_id', 'jenis_akun.id')
        ->select(DB::raw("SUM(jumlah) as total_biaya_debet"), 'jenis_akun.kode_akun', 'jenis_akun.nama_akun', 'jenis_akun.id', 'jenis_akun.type')
        ->groupBy('jenis_akun.kode_akun', 'jenis_akun.nama_akun', 'jenis_akun.id', 'jenis_akun.type')
        ->where('jenis_akun.status', 1)
        ->where('laba_rugi', 'BIAYA')
        ->havingRaw('CHAR_LENGTH(kode_akun) > 1')
        ->orderByRaw('LPAD(kode_akun, 1, 0) ASC')
        ->orderByRaw('LPAD(kode_akun, 5, 1) ASC')
        ->get();
        
        // return json_encode($akunPendapatan);
        return view('pages.app.laporan-laba.index', compact('akunPendapatan', 'akunBiaya'));
    }
}
