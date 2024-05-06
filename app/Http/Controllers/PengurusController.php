<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $pengurus;
    public function __construct()
    {
        $this->pengurus = new Pengurus();
    }
    public function index()
    {
        $pengurus = Pengurus::all();
        return view('pengurus.index', compact('pengurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengurus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'ketua' => 'required|unique:pengurus,ketua',
            'sekretaris' => 'required|unique:pengurus,sekretaris',
            'bendahara' => 'required|unique:pengurus,bendahara',
        ];
        $messages = [
            'required' => 'harus diisi',
            'unique' => 'Nama sudah ada silahkan ganti'
        ];
        $request->validate($rules, $messages);
        $this->pengurus->ketua = $request->ketua;
        $this->pengurus->sekretaris = $request->sekretaris;
        $this->pengurus->bendahara = $request->bendahara;
        $this->pengurus->save();
        return redirect()->route('pengurus.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pengurus = Pengurus::findOrFail($id);
        return view('pengurus.show', compact('pengurus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengurus = Pengurus::findOrFail($id);
        return view('pengurus.edit', compact('pengurus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $updated = Pengurus::findOrFail($id);
        $updated->ketua = $request->ketua;
        $updated->sekretaris = $request->sekretaris;
        $updated->bendahara = $request->bendahara;

        if ($updated->isDirty()) {
            $rules = [
                'ketua' => 'required|unique:pengurus,ketua',
                'sekretaris' => 'required|unique:pengurus,sekretaris',
                'bendahara' => 'required|unique:pengurus,bendahara',
            ];
            $messages = [
                'required' => 'harus diisi',
                'unique' => 'Nama sudah ada silahkan ganti'
            ];

            $request->validate($rules, $messages);
            $updated->ketua = $request->ketua;
            $updated->sekretaris = $request->sekretaris;
            $updated->bendahara = $request->bendahara;
            $updated->save();
            // Alert::info('Success', 'Berhasil Mengubah data');
            return redirect()->route('pengurus.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengurus = Pengurus::findOrFail($id);
        $pengurus->delete();
        return redirect()->route('pengurus.index');
    }
}
