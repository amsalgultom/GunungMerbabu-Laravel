<?php

namespace App\Http\Controllers;

use App\Hiking;
use App\Jalur;
use Illuminate\Http\Request;

class HikingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hikings =  Hiking::all();
        $list_hiking = Hiking::orderBy('nama','asc')->paginate(5);
        $jumlah_hiking = Hiking::count();
        return view('hikings.index', compact('hikings', 'jumlah_hiking', 'list_hiking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_jalur = Jalur::pluck('nama_jalur', 'id');
        return view('hikings.create', compact('list_jalur'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|size:16|unique:pendaki,nik',
            'nama' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
    ]);
        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'tgl_naik' => $request->tgl_naik,
            'tgl_turun' => $request->tgl_turun,
            'no_telp' => $request->no_telp,
            'id_jalur' => $request->id_jalur,
            'image' => $new_name
        ); 

        Hiking::create($form_data);     
        return redirect('/hikings') ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hiking  $hiking
     * @return \Illuminate\Http\Response
     */
    public function show(Hiking $hiking)
    {
        return view ('hikings.show', compact('hiking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hiking  $hiking
     * @return \Illuminate\Http\Response
     */
    public function edit(Hiking $hiking)
    {
        return view('hikings.edit', compact('hiking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hiking  $hiking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hiking $hiking)
    {   
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != ''){
            $request->validate([
                'nik' => 'required|size:16',
                'nama' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
        ]);
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);   
        }

        else{
            $request->validate([
                'nik' => 'required|size:16|unique:pendaki,nik',
            'nama' => 'required',
            'alamat' => 'required',
            'jk' => 'required|in:L,P',
            'tgl_naik' => 'required|date',
            'tgl_turun' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
        ]);
        }

        $form_data = array(

            'nik' => $request->nik,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'tgl_naik' => $request->tgl_naik,
            'tgl_turun' => $request->tgl_turun,
            'no_telp' => $request->no_telp,
            'id_jalur' => $request->id_jalur,
            'image' => $new_name
        ); 
        
        Hiking::whereId($hiking->id)->update($form_data);
        return redirect('/hikings')->with('success','Data hiking berhasil di ubah');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hiking  $hiking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hiking $hiking)
    {   
        Hiking::destroy($hiking->id);
        return redirect('/hikings')->with('status','Data Pendaki Berhasil Dihapus');
    }
}
