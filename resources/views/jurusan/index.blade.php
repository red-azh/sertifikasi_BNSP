@extends('master.app')

@section('konten')
<a href="{{route('jurusan.create')}}" class="btn btn-success"> <i class="fa-solid fa-plus-circle me-2"></i>tambah</a>
<div class="table-respponsive">
    <table class="table">
        <tr>
            <th>#</th>
            <th>Nama Jurusan</th>
            <th></th>

        <tr>
            @php
            $no = 1;
            @endphp
            @foreach ($jurusan as $item)
        </tr>

        <td>{{$no++}}</td>
        <td>{{$item->nama_jurusan}}</td>
        <td class="d-flex">
            <a href="{{route('jurusan.show', $item->id)}}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
            <a href="{{route('jurusan.edit', $item->id)}}" class="btn btn-warning mx-2"><i
                    class="fa-solid fa-pencil"></i></a>
            <form action="{{ route('jurusan.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin nih?')"><i
                        class="fa-solid fa-trash"></i></button>
            </form>
        </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
