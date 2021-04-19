@extends('partial.master')

@section('title','jawaban')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-primary alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
</div>
@endif
<a href="/answers/create" class="btn btn-primary my-3">Tambahkan jawaban</a>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">jawaban</th>
        <th scope="col">Pertanyaan</th>
        <th scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($answers as $no=>$answer)
    <tr>
        <th scope="row">{{$no+1}}</th>
        <td>{{$answer->jawaban}}</td>
        <td>{{$answer->post->body}}</td>
        <td>
            <a href="" class="btn btn-success">Edit</a>
            <a href="" class="btn btn-danger">Hapus</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection