@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @forelse ($posts as $post)
                            <div>
                                <h3><a href="{{ url('/post', [$post->_id]) }}">{{ $post->title }}</a></h3>
                                <div>
                                    By {{ $post->author }} at {{ $post->created_at->format('d/m/Y H:i') }}
                                </div>
                                <div>
                                    {!! $post->body !!}
                                </div>
                            </div>
                        @empty
                            <div>No posts here, try the <a href="{{ url('/') }}">main page</a></div>
                        @endforelse
                    </div>
                    <div class="panel-footer">
                        @if ($page > 1)
                            <a href="{{ $category ? url('/category', [$category, 'page', $page - 1]) : url('/page', [$page - 1]) }}">
                                Newer posts
                            </a>
                        @endif
                        @if (count($posts) > 0)
                            <a href="{{ $category ? url('/category', [$category, 'page', $page + 1]) : url('/page', [$page + 1]) }}">
                                Older posts
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
