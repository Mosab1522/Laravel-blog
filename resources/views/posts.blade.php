<!-- @ extends('layout')-->

<x-layout_blade>
    <!-- == bez medzery   @ section('content')-->

    @include('_posts-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())

            <x-posts-grid :posts="$posts"/>
        @else
            <p class="text-center">Nic tu neni kokotko</p>
        @endif


        </div>


    </main>

    {{--

    <!-- < ?php foreach ($posts as $post): ?>-->
    @foreach ($posts as $post)
        <article class ="{{$loop->first ? 'foobar' : ''}}">
        <h1>
            <a href="/posts/ {{$post->slug  }}">
                 {{$post->title  }}
                <!--< ?php echo $post->title?> medzera medzi < a ? kvoli komentu
                {$post->title}} dvojite {} musia byt
                -->
            </a>
        </h1>
        <p>
            <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a> By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a>
        </p>
        <div>
            {{$post->body  }}
        </div>
    </article>
    @endforeach --}}

</x-layout_blade> <!-- == bez medzery  @ endsection -->


<!-- < ?php endforeach; ?>-->
