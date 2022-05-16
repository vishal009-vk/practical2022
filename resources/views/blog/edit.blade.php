@extends('layouts.app')

@section('content')
<div class="container col-md-4">
    <a href="{{ route('blog.index') }}" class="btn btn-primary float-right">Back</a>
    <div style="clear:both"></div>

    @foreach ($errors->all() as $item)
        <div class="alert alert-danger">
            {{ $item }}
        </div>
    @endforeach


    <form action="{{ route('blog.update',$blog->id) }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" value="{{$blog->title}}" class="form-control" name="title">
        </div>

        <div class="form-group">
            <label for="">Description</label>
            <textarea type="text" class="form-control" name="description">{{$blog->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="">Start Date</label>
            <input type="date" class="form-control" value="{{$blog->start_date}}" name="start_date">
        </div>

        <div class="form-group">
            <label for="">End Date</label>
            <input type="date" class="form-control" value="{{$blog->end_date}}" name="end_date">
        </div>

        <div class="form-group">
            <label for="">Is Active</label>
            <select class="form-control" name="is_active">
                <option value="Yes" {{$blog->is_active == 'Yes' ? 'selected' : ''}}>Yes</option>
                <option value="No" {{$blog->is_active == 'No' ? 'selected' : ''}}>No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Image</label>
            <input type="file" class="form-control" name="image">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Update Blog">
        </div>
    </form>
</div>
@endsection
