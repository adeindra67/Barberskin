<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:45',
            'category_id' => 'required',
            'jenis' => 'required|max:45',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',
            'deskripsi' => 'nullable|max:255',
            'stok' => 'required|integer|min:0'
        ]);

        // Proses upload foto (jika ada)
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image'), $fileName); 
        } else {
            $fileName = 'nophoto.jpg';
        }

        Product::create([
            'nama' => $request->nama,
            'category_id' => $request->category_id,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'foto' => $fileName,
            'stok' => $request->stok
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama' => 'required|max:45',
            'category_id' => 'required',
            'jenis' => 'required|max:45',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',
            'deskripsi' => 'nullable|max:255',
            'stok' => 'required|integer|min:0'
        ]);

        // Proses upload foto (jika ada) - sesuaikan dengan logika aplikasi Anda
        if ($request->hasFile('foto')) {
            // ... (kode untuk upload dan update foto)
        }

        $product->update([
            'nama' => $request->nama,
            'category_id' => $request->category_id,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            // 'foto' => $fileName, // Update jika ada foto baru
            'stok' => $request->stok
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}