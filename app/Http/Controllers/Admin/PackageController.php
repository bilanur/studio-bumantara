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
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'duration'    => 'required|integer',
            'price'       => 'required|integer',
            'max_people'  => 'required|integer',
        ]);

        Package::create($request->all());

        return redirect()->route('admin.package.index')
            ->with('success', 'Paket berhasil ditambahkan');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.package.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'duration'    => 'required|integer',
            'price'       => 'required|integer',
            'max_people'  => 'required|integer',
        ]);

        $package = Package::findOrFail($id);
        $package->update($request->all());

        return redirect()->route('admin.package.index')
            ->with('success', 'Paket berhasil diupdate');
    }

    public function destroy($id)
    {
        Package::destroy($id);

        return redirect()->route('admin.package.index')
            ->with('success', 'Paket berhasil dihapus');
    }
}
