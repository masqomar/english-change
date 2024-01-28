<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\JenisAkun;
use App\Models\JenisKas;
use App\Models\TransaksiKas;
use Illuminate\Http\Request;

class KasTransferController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:kas-transfer.index')->only('index', 'show');
        $this->middleware('permission:kas-transfer.create')->only('create', 'store');
        $this->middleware('permission:kas-transfer.edit')->only('edit', 'update');
        $this->middleware('permission:kas-transfer.delete')->only('delete');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kasTransfers = TransaksiKas::with('dari_jenis_kas', 'untuk_jenis_kas')->where('jenis_transaksi', 'Transfer')->orderBy('tanggal_catat', 'DESC')->when(request()->q, function ($kasTransfers) {
            $kasTransfers = $kasTransfers->where('kode_transaksi', 'like', '%' . request()->q . '%');
        })->paginate(10);

        $jenisKas = JenisKas::where('status', 1)->where('Transfer', 'Y')->get();

        return view('pages.app.kas-transfer.index', compact('kasTransfers', 'jenisKas'));
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
            'untuk_kas_id' => 'required|numeric',
            'dari_kas_id' => 'required|numeric',
        ], [
            'tanggal_catat.required' => 'Data Wajib Diisi',
            'jumlah.required' => 'Data Wajib Diisi',
            'untuk_kas_id.required' => 'Data Wajib Diisi',
            'dari_kas_id.required' => 'Data Wajib Diisi',
        ]);

        $ambilData = TransaksiKas::withTrashed()->where('jenis_transaksi', 'Transfer')->count();
        $kodeUnik = 'TRF' .str_pad($ambilData + 1, 4, "0", STR_PAD_LEFT)  . date('m', strtotime(now())).  date('Y', strtotime(now()));

        $kasTransfers = TransaksiKas::create([
            'kode_transaksi' => $kodeUnik,
            'tanggal_catat' => $request->tanggal_catat,
            'jumlah' => $request->jumlah,
            'untuk_jenis_kas_id' => $request->untuk_kas_id,
            'dari_jenis_kas_id' => $request->dari_kas_id,
            'keterangan' => $request->keterangan,
            'jenis_transaksi' => 'Transfer', 
        ]);

        if ($kasTransfers) {
            //redirect dengan pesan sukses
            return redirect()->route('app.kas-transfer.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('app.kas-transfer.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $kasTransfer = TransaksiKas::findOrFail($id);
        $jenisKas = JenisKas::where('status', 1)->where('Transfer', 'Y')->get();

        return view('pages.app.kas-transfer.edit', compact('kasTransfer', 'jenisKas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'tanggal_catat' => 'required|date',
            'jumlah' => 'required|numeric',
            'untuk_kas_id' => 'required|numeric',
            'dari_kas_id' => 'required|numeric',
        ]);

        $kasTransfer = TransaksiKas::findOrFail($id);

        $kasTransfer->update([
            'tanggal_catat' => $request->tanggal_catat,
            'jumlah' => $request->jumlah,
            'untuk_jenis_kas_id' => $request->untuk_kas_id,
            'dari_jenis_kas_id' => $request->dari_kas_id,
            'keterangan' => $request->keterangan,
        ]);

        if ($kasTransfer) {
            //redirect dengan pesan sukses
            return redirect()->route('app.kas-transfer.index')->with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('app.kas-transfer.index')->with(['error' => 'Data Gagal Diperbarui!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kasTransfer = TransaksiKas::findOrFail($id);
        $kasTransfer->delete();
        if ($kasTransfer) {
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
