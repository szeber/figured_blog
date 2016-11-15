@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div>
                            <h3>{{ $post->title }}</h3>
                            <div>
                                By {{ $post->author }} at {{ $post->created_at->format('d/m/Y H:i') }}
                            </div>
                            <div>
                                Posted in category <a href="{{ url('/category', [$category->slug]) }}">
                                    {{ $category->name }}
                                </a>
                            </div>
                            <div>
                                {!! $post->body !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
