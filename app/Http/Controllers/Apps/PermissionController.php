<?php

namespace App\Http\Controllers\Apps;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permissions.index')->only('index', 'show');
        $this->middleware('permission:permissions.create')->only('create', 'store');
        $this->middleware('permission:permissions.edit')->only('edit', 'update');
        $this->middleware('permission:permissions.delete')->only('delete');
    }

    public function index(Request $request)
    {
        $permissions = Permission::when(request()->q, function ($permissions) {
            $permissions =  $permissions->where('name', 'like', '%' . request()->q . '%');
        })->latest()->paginate(10);

        return view('pages.app.permissions.index', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
        ], [
            'name.required' => 'Data Wajib Diisi'
        ]);

        $permission = Permission::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);

        if ($permission) {
            //redirect dengan pesan sukses
            return redirect()->route('app.permissions.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('app.permissions.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
