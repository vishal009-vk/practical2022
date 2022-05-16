@extends('layouts.app')

@section('content')
<div class="container col-md-4">
    <a href="{{ route('blog.index') }}" class="btn btn-primary float-right">Back</a>
    <div style="clear:both"></div>

    <div class="form-group">
        <label for="">Title</label>
        <br>
        {{$blog->title}}
    </div>

    <div class="form-group">
        <label for="">Description</label>
        <br>
        {{$blog->description}}
    </div>

    <div class="form-group">
        <label for="">Start Date</label>
        <br>
        {{$blog->start_date}}
    </div>

    <div class="form-group">
        <label for="">End Date</label>
        <br>
        {{$blog->end_date}}
    </div>

    <div class="form-group">
        <label for="">Image</label>
        <br>
        <img src="{{ url('storage',$blog->image) }}" alt="No File">
    </div>

</div>
@endsection
