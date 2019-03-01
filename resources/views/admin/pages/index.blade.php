@extends('layouts.admin')



@section('content')


<a href="{{ route('admin.pages.create') }}" class="btn btn-success float-right">Create</a>
<h1>Pages Overview</h1>

<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Slug</th>
            <th>Active</th>
            <th>Created</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pages as $page)
        <tr>
            <td>{{ $page->title }}</td>
            <td>{{ $page->slug }}</td>
            <td>{{ ($page->active) ? 'Yes' : 'No' }}</td>
            <td>{{ $page->created_at->format('d-m-Y H:i') }}</td>
            <td>

                {!! Form::open(['route' => ['admin.pages.destroy', $page->id], 'method' => 'DELETE']) !!}
                    <a href="{{ route('admin.pages.edit', ['id' => $page->id]) }}" class="btn btn-primary">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
