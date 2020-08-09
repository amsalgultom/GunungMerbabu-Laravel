@extends('template')
@section('title', 'jalur')
@section('main')       
        <div class="container">
            <div class="row">
                <div class="col-12">
            <h1 class="my-4 text-center">Data Jalur</h1>
            <table class="table table-bordered ">
            <thead class="thead-light">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Jalur</th>
            <th scope="col">Jarak</th>
            <th scope="col">Wilayah</th>
            </tr>
            </thead>
            <tbody>
            @foreach($jalur as $jlr)
            <tr><th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $jlr->nama_jalur}}</td>
            <td>{{ $jlr->jarak}}</td>
            <td>{{ $jlr->wilayah }}</td>
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
            </div>
            </div>
        </div><div class="row justify-content-center mt-5">
	<p>&copy; 2020 GunungMerbabuApp</p>	
</div>
@endsection