@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a href="{{ route('manage-blog.index') }}" class="btn btn-success">Manage Blog</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
