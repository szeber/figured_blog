@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Edit category</h1>
                <div class="panel panel-default">
                    <form method="post" action="{{ url('/admin/categories', [$category->_id ?: 'new']) }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ $category->name }}" required/>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="slug" class="col-md-4 control-label">Slug</label>
                            <input type="text" id="slug" class="form-control" name="slug" value="{{ $category->slug }}" required/>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Save" class="btn btn-lg btn-success" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
