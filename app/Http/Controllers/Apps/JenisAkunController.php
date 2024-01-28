<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\JenisAkun;
use Illuminate\Http\Request;

class JenisAkunController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:jenis-akun.index')->only('index', 'show');
        $this->middleware('permission:jenis-akun.create')->only('create', 'store');
        $this->middleware('permission:jenis-akun.edit')->only('edit', 'update');
        $this->middleware('permission:jenis-akun.delete')->only('delete');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisAkuns = JenisAkun::when(request()->q, function ($jenisAkuns) {
            $jenisAkuns = $jenisAkuns->where('nama_akun', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('pages.app.jenis-akun.index', compact('jenisAkuns'));
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
            'kode_akun' => 'required|max:200|unique:jenis_akun',
            'nama_akun' => 'required|max:200',
            'status' => 'required|numeric',
        ], [
            'kode_akun.required' => 'Data Wajib Diisi',
            'kode_akun.max' => 'Data Terlalu Panjang',
            'kode_akun.unique' => 'Data Sudah Terdaftar',
            'nama_akun.required' => 'Data Wajib Diisi',
            'nama_akun.max' => 'Data Terlalu Panjang',
            'status.required' => 'Data Wajib Diisi',
        ]);

        $jenisAkun = JenisAkun::create([
            'kode_akun' => $request->kode_akun,
            'nama_akun' => $request->nama_akun,
            'type' => $request->type,
            'laba_rugi' => $request->laba_rugi,
            'pemasukan' => $request->pemasukan,
            'pengeluaran' => $request->pengeluaran,
            'status' => $request->status,
        ]);

        if ($jenisAkun) {
            //redirect dengan pesan sukses
            return redirect()->route('app.jenis-akun.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('app.jenis-akun.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $jenisAkun = JenisAkun::findOrFail($id);

        return view('pages.app.jenis-akun.edit', compact('jenisAkun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisAkun $jenisAkun)
    {
        $this->validate($request, [
            'kode_akun'     => 'required|max:255',
            'nama_akun'   => 'required|max:255',
            'status'   => 'required',
        ]);

        $jenisAkun->update([
            'kode_akun'     => $request->kode_akun,
            'nama_akun'   => $request->nama_akun,
            'type'   => $request->type,
            'laba_rugi'   => $request->laba_rugi,
            'pemasukan'   => $request->pemasukan,
            'pengeluaran'   => $request->pengeluaran,
            'status'   => $request->status,
        ]);

        if ($jenisAkun) {
            //redirect dengan pesan sukses
            return redirect()->route('app.jenis-akun.index')->with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('app.jenis-akun.index')->with(['error' => 'Data Gagal Diperbarui!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenisAkun = JenisAkun::findOrFail($id);
        $jenisAkun->delete();
        if ($jenisAkun) {
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
