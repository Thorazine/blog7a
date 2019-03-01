@extends('layouts.admin')


@section('content')

    pages create

    {!! Form::open(['route' => 'admin.pages.store', 'method' => 'POST']) !!}

        <div class="form-group row">
            <label class="col-sm-3">
                Slug
            </label>
            <div class="col-sm-9 input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">{{ route('page', ['slug' => '/']) }}/</span>
                </div>
                {!! Form::text('slug', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3">
                Title
            </label>
            <div class="col-sm-9">
                {!! Form::text('title', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3">
                Body
            </label>
            <div class="col-sm-9">
                {!! Form::textarea('body', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3">
                Active
            </label>
            <div class="col-sm-9">
                {!! Form::checkbox('active', 1, true, []) !!}
            </div>
        </div>

        <div class="form-group row">
            <button type="submit" class="btn btn-success">Save</button>
        </div>

    {!! Form::close() !!}
@stop
