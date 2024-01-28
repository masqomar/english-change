<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\JenisAkun;
use App\Models\JenisKas;
use App\Models\TransaksiKas;
use Illuminate\Http\Request;

class KasKeluarController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:kas-keluar.index')->only('index', 'show');
        $this->middleware('permission:kas-keluar.create')->only('create', 'store');
        $this->middleware('permission:kas-keluar.edit')->only('edit', 'update');
        $this->middleware('permission:kas-keluar.delete')->only('delete');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kasKeluars = TransaksiKas::with('dari_jenis_kas', 'jenis_akun')->where('jenis_transaksi', 'Pengeluaran')->orderBy('tanggal_catat', 'DESC')->when(request()->q, function ($kasKeluars) {
            $kasKeluars = $kasKeluars->where('kode_transaksi', 'like', '%' . request()->q . '%');
        })->paginate(10);

        $jenisAkun = JenisAkun::where('status', 1)->where('Pengeluaran', 'Y')->get();
        $jenisKas = JenisKas::where('status', 1)->where('Pengeluaran', 'Y')->get();

        return view('pages.app.kas-keluar.index', compact('kasKeluars', 'jenisAkun', 'jenisKas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal_catat' => 'required|date',
            'jumlah' => 'required|numeric',
            'nama_akun' => 'required|numeric',
            'dari_kas_id' => 'required|numeric',
        ], [
            'tanggal_catat.required' => 'Data Wajib Diisi',
            'jumlah.required' => 'Data Wajib Diisi',
            'nama_akun.required' => 'Data Wajib Diisi',
            'dari_kas_id.required' => 'Data Wajib Diisi',
        ]);

        $ambilData = TransaksiKas::withTrashed()->where('jenis_transaksi', 'Pengeluaran')->count();
        $kodeUnik = 'TKK' .str_pad($ambilData + 1, 4, "0", STR_PAD_LEFT)  . date('m', strtotime(now())).  date('Y', strtotime(now()));

        $kasKeluars = TransaksiKas::create([
            'kode_transaksi' => $kodeUnik,
            'tanggal_catat' => $request->tanggal_catat,
            'jumlah' => $request->jumlah,
            'jenis_akun_id' => $request->nama_akun,
            'dari_jenis_kas_id' => $request->dari_kas_id,
            'keterangan' => $request->keterangan,
            'jenis_transaksi' => 'Pengeluaran', 
            'dk' => 'K'
        ]);

        if ($kasKeluars) {
            //redirect dengan pesan sukses
            return redirect()->route('app.kas-keluar.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('app.kas-keluar.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kasKeluar = TransaksiKas::findOrFail($id);
        $jenisAkun = JenisAkun::where('status', 1)->where('Pengeluaran', 'Y')->get();
        $jenisKas = JenisKas::where('status', 1)->where('Pengeluaran', 'Y')->get();

        return view('pages.app.kas-keluar.edit', compact('kasKeluar', 'jenisAkun', 'jenisKas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'tanggal_catat' => 'required|date',
            'jumlah' => 'required|numeric',
            'nama_akun' => 'required|numeric',
            'dari_kas_id' => 'required|numeric',
        ]);

        $kasKeluar = TransaksiKas::findOrFail($id);

        $kasKeluar->update([
            'tanggal_catat' => $request->tanggal_catat,
            'jumlah' => $request->jumlah,
            'jenis_akun_id' => $request->nama_akun,
            'dari_jenis_kas_id' => $request->dari_kas_id,
            'keterangan' => $request->keterangan,
        ]);

        if ($kasKeluar) {
            //redirect dengan pesan sukses
            return redirect()->route('app.kas-keluar.index')->with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('app.kas-keluar.index')->with(['error' => 'Data Gagal Diperbarui!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kasKeluar = TransaksiKas::findOrFail($id);
        $kasKeluar->delete();
        if ($kasKeluar) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
