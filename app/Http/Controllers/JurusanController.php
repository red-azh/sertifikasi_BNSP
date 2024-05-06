<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $jurusan;
    public function __construct()
    {
        $this->jurusan = new Jurusan();
    }
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('jurusan.index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required|min:3|max:100',
        ];
        $messages = [
            'required' => 'harus diisi',
            'max' => 'maksimal 100 karakter',
            'min' => 'minimal 3 karakter',
        ];

        $request->validate($rules, $messages);
        $this->jurusan->nama_jurusan = $request->nama;
        $this->jurusan->save();
        return redirect()->route('jurusan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.show', compact('jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit',compact('jurusan'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update = Jurusan::findOrFail($id);
        $update->nama_jurusan = $request->nama;
        if ($update->isDirty()) {
            $rules = [
                'nama' => 'required|min:3|max:100',
            ];
            $messages = [
                'required' => 'harus diisi',
                'max' => 'maksimal 100 karakter',
                'min' => 'minimal 3 karakter',
            ];

            $request->validate($rules, $messages);

            $update->nama_jurusan = $request->nama;
            $update->save();
            return redirect()->route('jurusan.index');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();
        return redirect()->route('jurusan.index');
    }
}
