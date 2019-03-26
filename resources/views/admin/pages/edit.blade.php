@extends('layouts.admin')


@section('content')

    <h2>Pages Edit</h2>

    @if(!$errors->isEmpty())
        <div class="alert alert-danger">
            Er is iets mis gegaan met uw invoer.
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['route' => ['admin.pages.update', $data->id], 'method' => 'PUT', 'files' => true]) !!}

        {!! Form::hidden('id', $data->id) !!}

        <div class="form-group row">
            <label class="col-sm-3">
                Slug
            </label>
            <div class="col-sm-9 input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">{{ route('page', ['slug' => '/']) }}/</span>
                </div>
                {!! Form::text('slug', $data->slug, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3">
                Image
            </label>
            <div class="col-sm-9">
                {!! Form::file('image', ['class' => 'form-control-file', 'autocomplete' => 'off']) !!}
                <button class="btn btn-danger" id="image" type="button">Remove</button>

                {!! Form::hidden('image', $data->image->id, ['id' => 'image_hidden']) !!}
                {{-- {{dd($data->image)}} --}}
                <img width="100" id="image_preview" src="{{ $data->image->url }}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3">
                Title
            </label>
            <div class="col-sm-9">
                {!! Form::text('title', $data->title, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3">
                Body
            </label>
            <div class="col-sm-9">
                {!! Form::textarea('body', $data->body, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3">
                Active
            </label>
            <div class="col-sm-9">
                {!! Form::checkbox('active', 1, $data->active, []) !!}
            </div>
        </div>

        <div class="form-group row">
            <button type="submit" class="btn btn-success">Save</button>
        </div>

    {!! Form::close() !!}
@stop


@section('script')
    <script type="text/javascript">
        $('#image').click(function(event) {
            $('#image_hidden').val('');
            $('#image_preview').remove();
        });
    </script>
@stop
