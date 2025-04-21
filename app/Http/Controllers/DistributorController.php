<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributor; // Ubah nama model

class DistributorController extends Controller 
{
    public function index()
    {
        $distributors = Distributor::all(); // Ubah nama variabel
        return view('distributor.index', compact('distributors')); // Ubah nama view
    }

    public function create()
    {
        return view('distributor.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:45',
            'jenis' => 'required|max:45',
            'alamat' => 'nullable|max:255',
            'logosupplier' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048' 
        ]);

        // Proses upload logo (jika ada)
        if ($request->hasFile('logosupplier')) {
            $file = $request->file('logosupplier');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image'), $fileName); 
        } else {
            $fileName = 'nophoto.jpg'; 
        }

        Distributor::create([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'alamat' => $request->alamat,
            'logosupplier' => $fileName 
        ]);

        return redirect()->route('distributors.index')->with('success', 'Distributor berhasil ditambahkan!');
    }

    public function show(Distributor $distributor) // Ubah nama parameter
    {
        return view('distributor.show', compact('distributor')); // Ubah nama view
    }

    public function edit(Distributor $distributor) // Ubah nama parameter
    {
        return view('distributor.edit', compact('distributor')); // Ubah nama view
    }

    public function update(Request $request, Distributor $distributor) // Ubah nama parameter
    {
        $request->validate([
            'nama' => 'required|max:45',
            'jenis' => 'required|max:45',
            'alamat' => 'nullable|max:255',
            'logosupplier' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048' 
        ]);

        // Proses upload logo (jika ada) - sesuaikan dengan logika aplikasi Anda
        if ($request->hasFile('logosupplier')) {
            // ... (kode untuk upload dan update logo)
        }

        $distributor->update([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'alamat' => $request->alamat,
            // 'logosupplier' => $fileName, // Update jika ada logo baru
        ]);

        return redirect()->route('distributors.index')->with('success', 'Distributor berhasil diupdate!');
    }

    public function destroy(Distributor $distributor) // Ubah nama parameter
    {
        $distributor->delete();
        return redirect()->route('distributors.index')->with('success', 'Distributor berhasil dihapus!');
    }
}