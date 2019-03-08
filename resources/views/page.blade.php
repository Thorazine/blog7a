@extends('layouts.default')


@section('title', $page->title)


@section('content')

    <img src="{{ $page->image->url }}">

	{!! $page->body !!}
@stop
