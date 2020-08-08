<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PertanyaanController extends Controller
{
    public function create()
    {
        return view('pertanyaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:questions|max:255',
            'isi' => 'required',
        ]);

        $query = DB::table('questions')->insert([
            'judul' => $request['judul'], 
            'isi' => $request['isi']
        ]);

        return redirect('/pertanyaan')->with('success', 'Pertanyaanmu berhasil disimpan!');
    }

    public function index()
    {
        $questions = DB::table('questions')->get();

        return view('pertanyaan.index', compact('questions'));
    }

    public function show($pertanyaan_id)
    {
        $question = DB::table('questions')->where('id', $pertanyaan_id)->first();

        return view('pertanyaan.show', compact('question'));
    }

    public function edit($pertanyaan_id)
    {
        $question = DB::table('questions')->where('id', $pertanyaan_id)->first();

        return view('pertanyaan.edit', compact('question'));
    }

    public function update($pertanyaan_id, Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
        ]);

        $query = DB::table('questions')->where('id', $pertanyaan_id)->update([
            'judul' => $request['judul'], 
            'isi' => $request['isi']
        ]);

        return redirect('/pertanyaan')->with('success', 'Berhasil mengubah pertanyaan!');
    }

    public function destroy($pertanyaan_id)
    {
        $query = DB::table('questions')->where('id', $pertanyaan_id)->delete();

        return redirect('/pertanyaan')->with('success', 'Berhasil menghapus pertanyaan!');
    }
}
