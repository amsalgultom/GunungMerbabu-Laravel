@extends('template')

@section('title', 'Pendaki')
@section('main')
            
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
            <h1 class="my-4 text-center">Data Pendaki</h1>
            @if (session('status'))
            <div class="alert alert-success">
            {{ session('status') }}
            </div>
            @endif
            <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
            <th scope="col">NIK</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Umur</th>
            <th scope="col">Alamat</th>
            <th scope="col">Jalur</th>
            <th scope="col">Tanggal Naik</th>
            <th scope="col">Tanggal Turun</th>
            <th scope="col">No Telp</th>
            <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody> 
            @foreach($list_pdk as $pdk)
            <td>{{ $pdk->nik }}</td>
            <td>{{ $pdk->nama }}</td>
            <td>{{ $pdk->jk }}</td>
            <td>{{ $pdk->umur }}</td>
            <td>{{ $pdk->alamat }}</td>
            <td>{{ $pdk->jalur->nama_jalur }}</td>
            <td>{{ $pdk->tgl_naik}}</td>
            <td>{{ $pdk->tgl_turun}}</td>
            <td>{{ $pdk->no_telp }}</td>
            <td>   
            <a href="/pendaki/{{ $pdk->id }}" class="btn btn-info">Detail</a>
            <a href="/pendaki/{{ $pdk->id }}/edit" class="btn btn-warning">Edit</a>
            <form action="/pendaki/{{$pdk->id}}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
            </tr>
            @endforeach
                </tbody>
            </table>

	<div class="table-nav float-right">
		
	<div class="tombol-nav">
	<a href="{{ url('pendaki/create') }}" class="btn btn-secondary mt-3" >Tambah Siswa</a>
</div></div><div class="jumlah-data ">
			<strong>Jumlah Siswa : {{ $jumlah_pdk }} </strong>
		
		<div class="paging">
			{{ $list_pdk->links() }}
		</div>
	</div>
<div class="row justify-content-center mt-5">
	<p>&copy; 2020 GunungMerbabuApp</p>	
</div>

@endsection