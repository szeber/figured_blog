@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Administration area</h1>
                <div class="panel panel-default">
                    <ul class="nav nav-pills nav-stacked">
                        <li>
                            <a href="{{ url('/admin/posts') }}">Manage Posts</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/categories') }}">Manage Categories</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
