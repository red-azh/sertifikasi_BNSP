<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;





class LembagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $lembaga;
    public function __construct()
    {
        $this->lembaga = new Lembaga();
    }
    public function index()
    {
        $lembaga = Lembaga::all();
        return view('lembaga.index', compact('lembaga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lembaga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required|min:3|max:100|unique:lembaga,nama_lembaga',
            'alamat' => 'required|min:3|max:100|unique:lembaga,alamat_lembaga',
        ];
        $messages = [
            'required' => 'harus diisi',
            'max' => 'maksimal 100 karakter',
            'min' => 'minimal 3 karakter',
            'unique' => 'Ini sudah pernah dipakai silahkan ganti',
        ];

        $request->validate($rules, $messages);

        $this->lembaga->nama_lembaga = $request->nama;
        $this->lembaga->alamat_lembaga = $request->alamat;
        $this->lembaga->save();
        Alert::success('Berhasil', 'Success Menambah Data');
        return redirect()->route('lembaga.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lembaga = Lembaga::find($id);
        return view('lembaga.show', compact('lembaga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lembaga = Lembaga::find($id);
        return view('lembaga.edit', compact('lembaga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updated = Lembaga::findOrFail($id);
        $updated->nama_lembaga = $request->nama;
        $updated->alamat_lembaga = $request->alamat;

        if ($updated->isDirty()) {
            $rules = [
                'nama' => 'required|min:3|max:100|unique:lembaga,nama_lembaga',
                'alamat' => 'required|min:3|max:100|unique:lembaga,alamat_lembaga',
            ];
            $messages = [
                'required' => 'harus diisi',
                'max' => 'maksimal 100 karakter',
                'min' => 'minimal 3 karakter',
                'unique' => 'Ini sudah pernah dipakai silahkan ganti',
            ];
            $request->validate($rules, $messages);
            $updated->nama_lembaga = $request->nama;
            $updated->alamat_lembaga = $request->alamat;
            $updated->save();
            Alert::info('Success', 'Berhasil Mengubah data');
            return redirect()->route('lembaga.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lembaga $lembaga)
    {
        $lembaga->delete();
        Alert::error('Berhasil', 'Data sudah Berhasil di hapus');
        return redirect()->route('lembaga.index');
    }
}
