@extends('layouts.app')

@section('additionalHeaders')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Edit post</h1>
                <div class="panel panel-default">
                    <form method="post" action="{{ url('/admin/posts', [$post->_id ?: 'new']) }}" id="editForm">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>
                            <input type="text" id="title" class="form-control" name="title" value="{{ $post->title }}" required/>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category_id" class="col-md-4 control-label">Category</label>
                            <select id="category_id" class="form-control" name="category_id" required>
                                <option value="">--- Please select ---</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->_id }}" @if($category->_id == $post->category_id) selected="selected"@endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body" class="col-md-4 control-label">Category</label>
                            <textarea id="body" class="form-control" name="body" rows="15" required>
                                {{ $post->body }}
                            </textarea>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="1" name="is_published" @if($post->is_published) checked="checked"@endif> Post is published
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="is_delete" value="0" id="isDeletedFlag" />
                            <input type="submit" value="Save" class="btn btn-lg btn-success" />
                            @if ($post->_id)<button type="submit" class="btn btn-lg btn-danger" id="deleteButton">Delete</button>@endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#body').summernote({
                height:300
            });
            $('#deleteButton').click(function(){
                $('#isDeletedFlag').val('1');
                $('#editForm').submit();
            })
        });
    </script>
@endsection
