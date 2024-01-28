<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\JenisAkun;
use App\Models\JenisKas;
use App\Models\TransaksiKas;
use Illuminate\Http\Request;

class KasMasukController extends Controller
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
        $kasMasuks = TransaksiKas::with('untuk_jenis_kas', 'jenis_akun')->where('jenis_transaksi', 'Pemasukan')->orderBy('tanggal_catat', 'DESC')->when(request()->q, function ($kasMasuks) {
            $kasMasuks = $kasMasuks->where('kode_transaksi', 'like', '%' . request()->q . '%');
        })->paginate(10);

        $jenisAkun = JenisAkun::where('status', 1)->where('Pemasukan', 'Y')->get();
        $jenisKas = JenisKas::where('status', 1)->where('Pemasukan', 'Y')->get();

        return view('pages.app.kas-masuk.index', compact('kasMasuks', 'jenisAkun', 'jenisKas'));
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
            'untuk_kas_id' => 'required|numeric',
        ], [
            'tanggal_catat.required' => 'Data Wajib Diisi',
            'jumlah.required' => 'Data Wajib Diisi',
            'nama_akun.required' => 'Data Wajib Diisi',
            'untuk_kas_id.required' => 'Data Wajib Diisi',
        ]);

        $ambilData = TransaksiKas::withTrashed()->where('jenis_transaksi', 'Pemasukan')->count();
        $kodeUnik = 'TKD' .str_pad($ambilData + 1, 4, "0", STR_PAD_LEFT)  . date('m', strtotime(now())).  date('Y', strtotime(now()));

        $kasMasuks = TransaksiKas::create([
            'kode_transaksi' => $kodeUnik,
            'tanggal_catat' => $request->tanggal_catat,
            'jumlah' => $request->jumlah,
            'jenis_akun_id' => $request->nama_akun,
            'untuk_jenis_kas_id' => $request->untuk_kas_id,
            'keterangan' => $request->keterangan,
            'jenis_transaksi' => 'Pemasukan', 
            'dk' => 'D'
        ]);

        if ($kasMasuks) {
            //redirect dengan pesan sukses
            return redirect()->route('app.kas-masuk.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('app.kas-masuk.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $kasMasuk = TransaksiKas::findOrFail($id);
        $jenisAkun = JenisAkun::where('status', 1)->where('Pemasukan', 'Y')->get();
        $jenisKas = JenisKas::where('status', 1)->where('Pemasukan', 'Y')->get();

        return view('pages.app.kas-masuk.edit', compact('kasMasuk', 'jenisAkun', 'jenisKas'));
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
            'untuk_kas_id' => 'required|numeric',
        ]);

        $kasMasuk = TransaksiKas::findOrFail($id);

        $kasMasuk->update([
            'tanggal_catat' => $request->tanggal_catat,
            'jumlah' => $request->jumlah,
            'jenis_akun_id' => $request->nama_akun,
            'untuk_jenis_kas_id' => $request->untuk_kas_id,
            'keterangan' => $request->keterangan,
        ]);

        if ($kasMasuk) {
            //redirect dengan pesan sukses
            return redirect()->route('app.kas-masuk.index')->with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('app.kas-masuk.index')->with(['error' => 'Data Gagal Diperbarui!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kasMasuk = TransaksiKas::findOrFail($id);
        $kasMasuk->delete();
        if ($kasMasuk) {
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
