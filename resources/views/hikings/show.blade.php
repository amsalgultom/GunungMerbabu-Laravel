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
				<td>{{ $hiking->nama }}</td>
			</tr>
			<tr>
				<th>NIK</th>
				<td>{{ $hiking->nik }}</td>
			</tr>
			<tr>
				<th>Jenis Kelamin</th>
				<td>{{$hiking->jk}}</td>
			</tr>
			<tr>
				<th>Umur</th>
				<td>{{ $hiking->umur }}</td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td>{{ $hiking->alamat }}</td>
			</tr>
			<tr>
				<th>Nama Jalur</th>
				<td>{{ $hiking->jalur->nama_jalur }}</td>
			</tr>
			<tr>
				<th>Tanggal Naik</th>
				<td>{{ $hiking->tgl_naik}}</td>
			</tr>
			<tr>
				<th>Tanggal Turun</th>
				<td>{{ $hiking->tgl_turun }}</td>
			</tr>
			<tr>
				<th>No Telp</th>
				<td>{{ $hiking->no_telp}}</td>
			</tr>
		</table>
    <div class='card 3 mx-auto' style="width:18rem;">
    <img class="card-img-top " src=" {{ asset('images/' . $hiking->image) }}" 
	alt="Card Image cap">
    </div></div>
            </div>
    
    <div class="row d-flex justify-content-center my-3">
    <a href="/hikings" class="card-link">Kembali</a>
  </div>
  <div class="row justify-content-center mt-5">
	<p>&copy; 2020 GunungMerbabuApp</p>	
</div>		
@endsection