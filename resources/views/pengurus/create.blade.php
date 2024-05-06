@extends('master.app')
@section('konten')
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <a href="{{route('pengurus.index')}}" class=" btn btn-warning mb-4 "><i class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
        <h6 class="mb-4">Tambah Form</h6>
        <form action="{{route('pengurus.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Ketua</label>
                <input type="text" name="ketua" class="form-control" @error('ketua') is-invalid @enderror>
                @error('ketua')
                <p class="text-danger">{{$message}}</p>
                @enderror

            </div>
            <div class="mb-3">
                <label class="form-label">Sekretaris</label>
                <input type="text" name="sekretaris" class="form-control" @error('sekretaris') is-invalid @enderror>
                @error('sekretaris')
                <p class="text-danger">{{$message}}</p>
                @enderror

            </div>
            <div class="mb-3">
                <label class="form-label">Bendahara</label>
                <input type="text" name="bendahara" class="form-control" @error('bendahara') is-invalid @enderror>
                @error('bendahara')
                <p class="text-danger">{{$message}}</p>
                @enderror

            </div>

            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus-circle me-2"></i>Tambah</button>
        </form>
    </div>
</div>
@endsection
