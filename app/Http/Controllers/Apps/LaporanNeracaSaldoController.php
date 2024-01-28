<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\JenisAkun;
use App\Models\JenisKas;
use App\Models\TransaksiKas;
use App\Models\ViewTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanNeracaSaldoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:laporan-neraca-saldo.index')->only('index', 'show');
        $this->middleware('permission:laporan-neraca-saldo.create')->only('create', 'store');
        $this->middleware('permission:laporan-neraca-saldo.edit')->only('edit', 'update');
        $this->middleware('permission:laporan-neraca-saldo.delete')->only('delete');
    }

    public function index()
    {
        $jenisKas = JenisKas::where('status', 1)->get();
        $saldo = [];
        foreach ($jenisKas as $saldoKas) {
            $saldo[] = [
                'kas_id' => $saldoKas->id,
                'kas_nama' => $saldoKas->nama,
                'sisaSaldo' => TransaksiKas::where('untuk_jenis_kas_id', $saldoKas->id)->sum('jumlah') - TransaksiKas::where('dari_jenis_kas_id', $saldoKas->id)->sum('jumlah')
            ];
        }

        $jenisAkun = JenisAkun::where('status', 1)->orderByRaw('LPAD(kode_akun, 1, 0) ASC')->orderByRaw('LPAD(kode_akun, 5, 1) ASC')->get();
        $saldoAkun = [];
        foreach ($jenisAkun as $akun) {
            $saldoAkun[] = [
                'akun_id' => $akun->id,
                'akun_nama' => $akun->nama_akun,
                'transaksiKredit' => TransaksiKas::where('jenis_akun_id', $akun->id)->where('dk', 'K')->sum('jumlah'),
                'transaksiDebet' =>  TransaksiKas::where('jenis_akun_id', $akun->id)->where('dk', 'D')->sum('jumlah')
            ];
        }

        // return json_encode($saldoAkun);
        return view('pages.app.laporan-neraca-saldo.index', compact('saldo', 'jenisAkun'));
    }
}
