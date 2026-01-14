<?php

namespace App\Http\Controllers;

use App\Models\Package;

class PackagePageController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('price', 'asc')->get();

        return view('packages', compact('packages'));
    }
}
