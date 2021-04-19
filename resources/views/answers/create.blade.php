@extends('partial.master')

@section('title','Form tambah jawaban')

@section('content')
<form action="/answers" method="post">
    @csrf
    <div class="form-group">
        <label for="post_id">Pertanyaan/Soal</label>
        <select class="form-control" id="post_id" name="post_id">
        @foreach ($post as $p)
        <option value="{{$p->id}}">{{$p->body}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="jawaban">Jawaban</label>
        <textarea class="form-control" id="jawaban" rows="3" name="jawaban">
        </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection