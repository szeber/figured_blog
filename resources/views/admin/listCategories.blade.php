@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Manage categories</h1>
                <div class="panel panel-default">
                    <div class="panel-body">
                        @forelse ($categories as $category)
                            <div>
                                <a href="{{ url('/admin/categories', [$category->id]) }}">
                                    {{ $category->name }} ({{ $category->slug }})
                                </a>
                            </div>
                        @empty
                            <h3>There are no categories</h3>
                        @endforelse
                    </div>
                    <div class="panel-footer">
                        <a href="{{ url('/admin/categories/new') }}">Create new category</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
