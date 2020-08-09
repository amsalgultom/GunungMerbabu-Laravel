@extends('template')

@section('title', 'Detail Pendaki')

@section('main')
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
            <h1 class="mt-3 text-center">Data Pendaki</h1>

            <div class="card" >
  <div class="card-body">
  <table class="table table-striped">
			<tr>
				<th>Nama</th>
				<td>{{ $pendaki->nama }}</td>
			</tr>
			<tr>
				<th>NIK</th>
				<td>{{ $pendaki->nik }}</td>
			</tr>
			<tr>
				<th>Jenis Kelamin</th>
				<td>{{$pendaki->jk}}</td>
			</tr>
			<tr>
				<th>Umur</th>
				<td>{{ $pendaki->umur }}</td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td>{{ $pendaki->alamat }}</td>
			</tr>
			<tr>
				<th>Nama Jalur</th>
				<td>{{ $pendaki->jalur->nama_jalur }}</td>
			</tr>
			<tr>
				<th>Tanggal Naik</th>
				<td>{{ $pendaki->tgl_naik}}</td>
			</tr>
			<tr>
				<th>Tanggal Turun</th>
				<td>{{ $pendaki->tgl_turun }}</td>
			</tr>
			<tr>
				<th>No Telp</th>
				<td>{{ $pendaki->no_telp}}</td>
			</tr>
		</table>
    <div class='card 3 mx-auto' style="width:18rem;">
    <img class="card-img-top " src=" {{ asset('images/' . $pendaki->image) }}" 
	alt="Card Image cap">
    </div></div>

    <div class="row d-flex justify-content-center my-2">
    <a href="/pendaki" class="card-link">Kembali</a>
  </div>
</div>        
        </div>
		
@endsection