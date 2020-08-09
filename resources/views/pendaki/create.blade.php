@extends('template')

@section('title', 'Tambah Pendaki')

@section('main')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
            <h1 class="mt-3 text-center">Tambah Pendaki</h1>
            <form method="post" action="/pendaki" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" 
                placeholder="Masukkan NIK" name="nik" value="{{ old('nik')}}">
                @error('nik')
                <div class="invalid-feedback">
                {{ $message }}
                @enderror     
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" 
                placeholder="Masukkan Nama" name="nama" value="{{ old('nama')}}">
                @error('nama')
                <div class="invalid-feedback">
                {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select name="jk" class="form-control" for="jk" id="jk" value="{{ old('jk')}}">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
                </select>
                
            </div>
            <div class="form-group">
                <label for="umur">Umur</label>
                <input type="text" class="form-control" id="umur" 
                placeholder="Masukkan Umur" name="umur" value="{{ old('umur')}}">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" 
                placeholder="Masukkan Alamat" name="alamat" value="{{ old('alamat')}}">
            </div>
            <div class="form-group">
                <label for="id_jalur">Jalur</label>
                <select name="id_jalur" class="form-control" for="id_jalur" id="id_jalur" value="{{ old('id_jalur')}}">
                <option value="">Pilih Jalur</option>
                <option value="1">Selo</option>
                <option value="2">Swanting</option>
                <option value="3">Wekas</option>
                <option value="4">Cunthel</option>
                <option value="5">Thekelan</option>
                </select>
            </div> 
            <div class="form-group">
                <label for="tgl_naik">Tanggal Naik</label>
                <input type="date" class="form-control" id="tgl_naik" 
                placeholder="Masukkan Tanggal Naik" name="tgl_naik" value="{{ old('tgl_naik')}}">
            </div>
            <div class="form-group">
                <label for="tgl_turun">Tanggal Turun</label>
                <input type="date" class="form-control" id="tgl_turun" 
                placeholder="Masukkan Tanggal Turun" name="tgl_turun" value="{{ old('tgl_turun')}}">
            </div>
            <div class="form-group">
                <label for="no_telp">Nomor Telepon</label>
                <input type="text" class="form-control" id="no_telp" 
                placeholder="Masukkan Nomor Telepon" name="no_telp" value="{{ old('no_telp')}}">
            </div>
            <div class="form-group">
                <label for="image">Foto</label> <br>
                <input type="file" id="image" 
                 name="image" value="image"> 
            </div>
            <div class="form-group">
            <div class="row d-flex justify-content-center">
            <button type="submit"  class="btn btn-primary">Tambah Data</button>
            </div>
            
            </form>

            </div>
            </div>
        </div>
@endsection