<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->get();
        return view('admin.package.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.package.create');
    }

    public function store(Request $request)
    {
        Package::create($request->all());
        return redirect('/admin/package')->with('success', 'Paket berhasil ditambahkan');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.package.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);
        $package->update($request->all());

        return redirect('/admin/package')->with('success', 'Paket berhasil diupdate');
    }

    public function destroy($id)
    {
        Package::destroy($id);
        return redirect('/admin/package')->with('success', 'Paket berhasil dihapus');
    }
}
