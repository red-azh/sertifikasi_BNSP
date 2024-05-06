@extends('master.app')

@section('konten')
<a href="{{route('jurusan.index')}}" class=" btn btn-warning mb-4 ms-2">Kembali</a>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h3>Detail Jurusan</h3>
        </div>
        <div class="col-md-9">
            <table class="table">

                <tr>
                    <th>Nama Jurusan :</th>
                    <td>{{$jurusan->nama_jurusan}}</td>
                </tr>
                <tr>
                    <th>Terakhir Dibuat :</th>
                    <td>{{$jurusan->created_at}}</td>
                </tr>
                <tr>
                    <th>Terakhir Diperbarui :</th>
                    <td>{{$jurusan->updated_at}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>




@endsection