@extends('master.app')

@section('konten')
<a href="{{route('pengurus.index')}}" class=" btn btn-warning mb-4 ms-2"><i
        class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h3>Detail Pengurus</h3>
        </div>
        <div class="col-md-9">
            <table class="table">

                <tr>
                    <th>Nama Ketua :</th>
                    <td>{{$pengurus->ketua}}</td>
                </tr>

                <tr>
                    <th>Nama Bendahara : </th>
                    <td>{{$pengurus->sekretaris}}</td>
                </tr>
                <tr>
                    <th>Nama Bendahara : </th>
                    <td>{{$pengurus->bendahara}}</td>
                </tr>
                <tr>
                    <th>Terakhir Dibuat :</th>
                    <td>{{$pengurus->created_at}}</td>
                </tr>
                <tr>
                    <th>Terakhir Diperbarui :</th>
                    <td>{{$pengurus->updated_at}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>




@endsection