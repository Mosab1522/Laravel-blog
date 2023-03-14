<!-- @ extends('layout')-->

<x-layout_blade> <!-- == bez medzery   @ section('content')-->



    <!-- < ?php foreach ($posts as $post): ?>-->
    @foreach ($posts as $post)
        <article class ="{{$loop->first ? 'foobar' : ''}}">
        <h1>
            <a href="/posts/<?= $post->slug ?>">
                <?= $post->title ?>   
                <!--< ?php echo $post->title?> medzera medzi < a ? kvoli komentu
                {$post->title}} dvojite {} musia byt
                -->
            </a>
        </h1>
        <p>
            <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>
        <div>
            <?= $post->body ?>
        </div>
    </article>
    @endforeach

</x-layout_blade> <!-- == bez medzery  @ endsection -->
   
    
     <!-- < ?php endforeach; ?>-->

