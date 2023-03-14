@extends('layout')

@section('content')
    <h1>Post</h1>
<article>
    <h1><?= $post->title; ?></h1>
    <p>
        <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
    </p>
    <p><?= $post->body;?> </p>
    
    <!-- {! ! $post->body;!!}  medzera medzi ! kvoli komentu-->
</article>
<a href="/">Back</a>"
@endsection
