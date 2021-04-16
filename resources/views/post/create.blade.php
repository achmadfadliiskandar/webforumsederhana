@extends('partial.master')

@section('title', 'Forum Tambah Pertanyaan')

@section('content')
    <h2 class="ml-1">Tambah Data</h2>
    <form action="/post" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan Title" value="{{old('title')}}">
            @error('title')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="body">body</label>
            <input type="text" class="form-control" name="body" id="body" placeholder="Masukkan Body" value="{{old('body')}}">
            @error('body')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" class="form-control" id="tags" name="tags" value="{{old('tags','')}}" placeholder="isi dengan baik ya">
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>

@endsection