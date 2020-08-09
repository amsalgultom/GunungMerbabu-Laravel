@extends('template')
@section('title', 'Pendaki')
@section('main')
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
            <h1 class="mt-4 text-center" >Data Pendaki</h1>
             @if (!empty($list_hiking))
            <ul class="list-group mt-3">
                 @foreach ($list_hiking as $hiking)
                     <li class="list-group-item d-flex justify-content-between align-items-center">    
                {{ $hiking->nama }}
            <a href="/hikings/{{ $hiking->id }}" class="badge bagde-info">Detail</a>
                </li>
                @endforeach         
            </ul>

            <ul class="list-group my-2">
            <div class="jumlah-data">
                 <strong> Jumlah Pendaki: {{ $jumlah_hiking }} </strong>
             </div>
             <div class="paging">
                {{ $list_hiking->links() }}
            </div>
            </ul>
            @else
                <p>Tidak ada data siswa.</p>
            @endif
            </div>      
            </div>
        </div><div class="row justify-content-center mt-5">
	<p>&copy; 2020 GunungMerbabuApp</p>	
</div>
@endsection