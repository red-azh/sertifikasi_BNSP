@extends('master.app')
@section('konten')
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <a href="{{route('lembaga.index')}}" class=" btn btn-warning mb-4 "><i
                class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
        <h6 class="mb-4">edit Form</h6>
        <form action="{{route('lembaga.update', $lembaga->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Lembaga</label>
                <input type="text" name="nama" value="{{old('nama', $lembaga->nama_lembaga)}}" class="form-control"
                    @error('nama') is-invalid @enderror>
                @error('nama')
                <p class="text-danger">{{$message}}</p>
                @enderror

            </div>
            <div class="mb-3">
                <label class="form-label">Alamat Lembaga</label>
                <input type="text" name="alamat" value="{{old('nama', $lembaga->alamat_lembaga)}}" class="form-control"
                    @error('alamat') is-invalid @enderror>
                @error('alamat')
                <p class="text-danger">{{$message}}</p>
                @enderror

            </div>

            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane me-2"></i>edit</button>
        </form>
    </div>
</div>
@endsection