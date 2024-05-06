@extends('master.app')
@section('konten')
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <a href="{{route('jurusan.index')}}" class=" btn btn-warning mb-4 "><i
                class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
        <h6 class="mb-4">Tambah Form</h6>
        <form action="{{route('jurusan.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama jurusan</label>
                <input type="text" name="nama" class="form-control" @error('nama') is-invalid @enderror>
                @error('nama')
                <p class="text-danger">{{$message}}</p>
                @enderror

            </div>
 
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus-circle me-2"></i>Tambah</button>
        </form>
    </div>
</div>
@endsection
