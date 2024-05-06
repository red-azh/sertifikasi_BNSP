@extends('master.app')

@section('konten')
<a href="{{route('lembaga.index')}}" class=" btn btn-warning mb-4 ms-2"><i class="fa-solid fa-arrow-left me-2"></i>
    Kembali</a>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h3>Detail Lembaga</h3>
        </div>
        <div class="col-md-9">
            <table class="table">

                <tr>
                    <th>Nama Lembaga :</th>
                    <td>{{$lembaga->nama_lembaga}}</td>
                </tr>

                <tr>
                    <th>Alamat Lembaga : </th>
                    <td>{{$lembaga->alamat_lembaga}}</td>
                </tr>
                <tr>
                    <th>Terakhir Dibuat :</th>
                    <td>{{$lembaga->created_at}}</td>
                </tr>
                <tr>
                    <th>Terakhir Diperbarui :</th>
                    <td>{{$lembaga->updated_at}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>




@endsection