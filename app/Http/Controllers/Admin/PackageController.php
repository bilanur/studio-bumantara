<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('packages', 'public');
        }

        Package::create($data);

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
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $package = Package::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {

            if ($package->image) {
                Storage::disk('public')->delete($package->image);
            }

            $data['image'] = $request->file('image')->store('packages', 'public');
        }

        $package->update($data);

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
