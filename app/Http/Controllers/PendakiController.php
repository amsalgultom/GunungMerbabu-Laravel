<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pendaki;
use App\Jalur;

class PendakiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pdk =  Pendaki::all();
        $list_pdk = Pendaki::orderBy('nama','asc')->paginate(5);
        $jumlah_pdk = Pendaki::count();
        return view('pendaki.index', compact('pdk', 'jumlah_pdk', 'list_pdk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_jalur = Jalur::pluck('nama_jalur', 'id');
        return view('pendaki.create', compact('list_jalur'));
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
            'nik' => 'required|size:16',
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

        Pendaki::create($form_data);
          
        return redirect('/pendaki') ->with('success', 'User created successfully.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaki $pendaki)
    {
        return view ('pendaki.show', compact('pendaki'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaki $pendaki)
    {

        return view('pendaki.edit', compact('pendaki'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Pendaki $pendaki)
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
                'nik' => 'required|size:16',
                'nama' => 'required',
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
        
        Pendaki::whereId($pendaki->id)->update($form_data);
        return redirect('/pendaki')->with('success','Data Pendaki berhasil di ubah');
        
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaki $pendaki)
    {
        Pendaki::destroy($pendaki->id);
        return redirect('/pendaki')->with('status','Data Pendaki Berhasil Dihapus');
    }
    

}
