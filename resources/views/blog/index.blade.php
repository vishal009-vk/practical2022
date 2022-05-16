@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('blog.create') }}" class="btn btn-primary float-right">Create Blog</a>
    <div style="clear:both"></div>
    <table class="table mt-5">
        <thead>
            <tr class="bg-dark text-white">
                <th>Sr No</th>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($blog as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ ($item->is_active == 'Yes') ? 'Active' : 'In Active' }}</td>
                    <td width="20%">
                        <form action="{{ route('blog.destroy',$item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('blog.show',$item->id) }}" class="btn btn-warning"> Show </a>
                            <a href="{{ route('blog.edit',$item->id) }}" class="btn btn-success"> Edit </a>
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $blog->links() !!}
</div>
@endsection
