@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Manage posts</h1>
                <div class="panel panel-default">
                    <div class="panel-body">
                        @forelse ($posts as $post)
                            <div>
                                <a href="{{ url('/admin/posts', [$post->id]) }}">
                                    {{ $post->title }}
                                    by {{ $post->author }}
                                    @if ($post->is_published)
                                        <strong>Published</strong>
                                    @else
                                        Not published
                                    @endif
                                </a>
                            </div>
                        @empty
                            <h3>There are no posts</h3>
                        @endforelse
                    </div>
                    <div class="panel-footer">
                        @if ($page > 1)
                            <a href="{{ url('/admin/posts/page', [$page - 1]) }}">
                                Newer posts
                            </a>
                        @endif
                        @if (count($posts) > 0)
                            <a href="{{ url('/admin/posts/page', [$page + 1]) }}">
                                Older posts
                            </a>
                        @endif
                        <br />
                        <a href="{{ url('/admin/posts/new') }}">Create new post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
