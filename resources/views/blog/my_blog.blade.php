@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        @foreach ($blog as $item)
            <div class="col-md-3 card mr-5">
                <img src="{{ url('storage',$item->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text">{{ $item->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
