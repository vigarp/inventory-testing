<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::latest()->get();
        return view('barangs.index', compact('barangs'));
    }

    public function create()
    {
        return view('barangs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_barang' => 'required|string|max:155',
            'cabang' => 'required',
            'buyer' => 'required',
            'stock' => 'required',
        ]);

        $barangs = Barang::create([
            'nama_barang' => $request->nama_barang,
            'cabang' => $request->cabang,
            'buyer' => $request->buyer,
            'stock' => $request->stock,
        ]);

        if ($barangs) {
            return redirect()
                ->route('barang.index')
                ->with([
                    'success' => 'Barang berhasil dibuat'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    public function edit($id)
    {
        $barangs = Barang::findOrFail($id);
        return view('barangs.edit', compact('barangs'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_barang' => 'required|string|max:155',
            'cabang' => 'required',
            'buyer' => 'required',
            'stock' => 'required',
        ]);

        $barangs = Barang::findOrFail($id);

        $barangs->update([
            'nama_barang' => $request->nama_barang,
            'cabang' => $request->cabang,
            'buyer' => $request->buyer,
            'stock' => $request->stock,
        ]);

        if ($barangs) {
            return redirect()
                ->route('barang.index')
                ->with([
                    'success' => 'Barang berhasil di perbarui'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    public function destroy($id)
    {
        $barangs = Barang::findOrFail($id);
        $barangs->delete();

        if ($barangs) {
            return redirect()
                ->route('barang.index')
                ->with([
                    'success' => 'Barang berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('barangs.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
