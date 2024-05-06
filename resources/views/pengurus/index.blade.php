@extends('master.app')

@section('konten')
<a href="{{route('pengurus.create')}}" class="btn btn-success mb-3"><i
        class="fa-solid fa-plus-circle me-2"></i>tambah</a>
<div class="table-respponsive">
    <table class="table">
        <tr>
            <th>#</th>
            <th>Ketua</th>
            <th>Sekretaris</th>
            <th>Bendahara</th>
            <th></th>

        <tr>
            @php
            $no = 1;
            @endphp
            @foreach ($pengurus as $item)
        </tr>

        <td>{{$no++}}</td>
        <td>{{$item->ketua}}</td>
        <td>{{$item->sekretaris}}</td>
        <td>{{$item->bendahara}}</td>
        <td class="d-flex">
            <a href="{{route('pengurus.show', $item->id)}}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
            <a href="{{route('pengurus.edit', $item->id)}}" class="btn btn-warning mx-2"><i
                    class="fa-solid fa-pencil"></i></a>
            <form action="{{ route('pengurus.destroy', $item->id) }}" method="post">
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