@extends('common.master')

@section('content')
    <section class="hero  is-medium  is-bold is-primary">
        <div class="hero-body">
            <div class="container">
                <p class="title is-2">News</p>
                <p class="subtitle is-3">The latest news on the HZ</p>

            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <div class="content">

                        <div class="has-text-right">
                            <a href="/posts/create" class="button is-primary">Add a new article...</a>
                        </div>

                        <div class="column is-12">
                            @foreach($posts as $post)
                                <div class="panel">
                                    <a class="panel-block" href="{{ route('posts.show', $post) }}">
                                        <article class="media">
                                            <figure class="media-left">
                                                <p class="image is-128x128">
                                                    <img src="{{$post->img_url}}" alt="post picture">
                                                </p>
                                            </figure>
                                            <div class="media-content">
                                                <div class="content">
                                                    <p>
                                                        <strong>{{ $post->title }}</strong>
                                                        <small>{{ $post->published_at }}</small>
                                                        <br>
                                                        {{ $post->excerpt }}
                                                    </p>
                                                </div>
                                            </div>
                                        </article>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
    </section>
@endsection
