<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function index()
    {
        // Mengambil data solusi dari database
        $solutions = Solution::all();
        
        // Memuat halaman index solusi dan mengirimkan data solusi ke halaman tersebut
        return view('solutions.index', compact('solutions'));
    }

    public function create()
    {
        // Memuat halaman form solusi
        return view('solutions.create');
    }

    public function store(Request $request)
    {
        // Validasi inputan dari form
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'user_id' => 'required'
        ]);
        
        // Menyimpan data solusi baru ke database
        Solution::create($request->all());
        
        // Kembali ke halaman index solusi
        return redirect()->route('solutions.index')->with('success', 'Solusi berhasil ditambahkan.');
    }

    public function edit(Solution $solution)
    {
        // Memuat halaman form edit solusi dan mengirimkan data solusi ke halaman tersebut
        return view('solutions.edit', compact('solution'));
    }

    public function update(Request $request, Solution $solution)
    {
        // Validasi inputan dari form
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'user_id' => 'required'
        ]);
        
        // Mengupdate data solusi yang ada di database
        $solution->update($request->all());
        
        // Kembali ke halaman index solusi
        return redirect()->route('solutions.index')->with('success', 'Solusi berhasil diupdate.');
    }

    public function destroy(Solution $solution)
    {
        // Menghapus data solusi yang ada di database
        $solution->delete();
        
        // Kembali ke halaman index solusi
        return redirect()->route('solutions.index')->with('success', 'Solusi berhasil dihapus.');
    }
}
