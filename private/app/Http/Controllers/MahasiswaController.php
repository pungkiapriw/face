<?php

namespace App\Http\Controllers;

use App\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = mahasiswa::all();
        return view('admin.mhsview',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mhsenrol');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uploadedFile = $request->file('foto');
        $imgName = $uploadedFile->getClientOriginalName();
        $ext = $uploadedFile->getClientOriginalExtension();
        if($ext == 'png' || $ext =='jpg'){
        $uploadedFile->move(base_path('python/images/'), $imgName);
           
        $data = [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'foto'  => $imgName
        ];
        mahasiswa::create($data);
        return back()->WithErrors('Berhasil Enrol Mahasiswa dengan nama '.$request->nama);
    }
    else{
        return back()->WithErrors('Maaf Foto Harus Berformat PNG atau JPG');
    } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        mahasiswa::destroy($id);
        return back()->WithErrors('Berhasil Hapus Data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = mahasiswa::find($id);
        return view('admin.mhsedit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = ["nim"=>$request->nim,"nama"=>$request->nama,"email"=>$request->email];
        mahasiswa::find($id)->update($data);
        return back()->WithErrors('Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(mahasiswa $mahasiswa)
    {
        //
    }
}
