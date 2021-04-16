@extends('partial.master')

@section('title')
    Lihat data
@endsection

@section('content')
<h2>Show Post {{$post->id}}</h2>
<h4>{{$post->title}}</h4>
<p>{{$post->body}}</p>
<p>Author : {{$post->author->name}}</p>

<div>
Tags : 
@forelse($post->tags as $tag)
    <button class="btn btn-primary">{{$tag->tag_name}}</button>
@empty
    No Data
@endforelse
</div>
@endsection