<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\JenisKas;
use Illuminate\Http\Request;

class JenisKasController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:jenis-kas.index')->only('index', 'show');
        $this->middleware('permission:jenis-kas.create')->only('create', 'store');
        $this->middleware('permission:jenis-kas.edit')->only('edit', 'update');
        $this->middleware('permission:jenis-kas.delete')->only('delete');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisKas = JenisKas::when(request()->q, function ($jenisKas) {
            $jenisKas = $jenisKas->where('nama', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('pages.app.jenis-kas.index', compact('jenisKas'));
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
            'nama' => 'required|max:200',
            'status' => 'required|numeric',
        ], [
            'nama.required' => 'Data Wajib Diisi',
            'nama.max' => 'Data Terlalu Panjang',
            'status.required' => 'Data Wajib Diisi',
        ]);

        $jenisKas = JenisKas::create([
            'nama' => $request->nama,
            'status' => $request->status,
            'transfer' => $request->transfer,
            'pemasukan' => $request->pemasukan,
            'pengeluaran' => $request->pengeluaran,
        ]);

        if ($jenisKas) {
            //redirect dengan pesan sukses
            return redirect()->route('app.jenis-kas.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('app.jenis-kas.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $jenisKas = JenisKas::findOrFail($id);

        return view('pages.app.jenis-kas.edit', compact('jenisKas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama'     => 'required|max:255',
            'status'   => 'required',
        ]);

        $jenisKas = JenisKas::findOrFail($id);

        $jenisKas->update([
            'nama'     => $request->nama,
            'status'   => $request->status,
            'transfer'   => $request->transfer,
            'pemasukan'   => $request->pemasukan,
            'pengeluaran'   => $request->pengeluaran,
        ]);

        if ($jenisKas) {
            //redirect dengan pesan sukses
            return redirect()->route('app.jenis-kas.index')->with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('app.jenis-kas.index')->with(['error' => 'Data Gagal Diperbarui!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenisKas = JenisKas::findOrFail($id);
        $jenisKas->delete();
        if ($jenisKas) {
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
