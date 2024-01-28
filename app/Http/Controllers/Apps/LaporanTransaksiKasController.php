<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\TransaksiKas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class LaporanTransaksiKasController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:laporan-transaksi-kas.index')->only('index', 'show');
        $this->middleware('permission:laporan-transaksi-kas.create')->only('create', 'store');
        $this->middleware('permission:laporan-transaksi-kas.edit')->only('edit', 'update');
        $this->middleware('permission:laporan-transaksi-kas.delete')->only('delete');
    }

    public  function index()
    {
        $transaksiKas = DB::table('transaksi_kas')
            ->leftJoin('jenis_kas as untuk_kas', 'untuk_kas.id', 'transaksi_kas.untuk_jenis_kas_id')
            ->leftJoin('jenis_kas as from_kas', 'from_kas.id', 'transaksi_kas.dari_jenis_kas_id')
            ->leftJoin('jenis_akun', 'jenis_akun.id', 'transaksi_kas.jenis_akun_id')
            ->select('transaksi_kas.*', 'untuk_kas.nama as nama_untuk_kas', 'from_kas.nama as nama_dari_kas', 'jenis_akun.nama_akun')
            ->orderBy('tanggal_catat', 'ASC')
            ->when(request()->q, function ($transaksiKas) {$transaksiKas = $transaksiKas->where('kode_transaksi', 'like', '%' . request()->q . '%');})->paginate(10);

        // return json_encode($transaksiKas);
        return view('pages.app.laporan-transaksi-kas.index', compact('transaksiKas'));
    }
}
