@extends('layouts.admin')


@section('content')

    <h2>Pages Edit</h2>


    {!! Form::open(['route' => ['admin.pages.update', $data->id], 'method' => 'PUT', 'files' => true]) !!}

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

                {!! Form::hidden('image', $data->image) !!}
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
