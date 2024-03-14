@extends('layouts.app')
{{--Customize layout sections--}}

@section('subtitle','Welcome')
@section('content_header_title','Home')
@section('content_header_subtitle','Welcome')


{{--Content body: main page content--}}

@section('content_body')
<p>Welcome to this BEAUTIFUL admin panel!</p>
@stop
{{--Push extra CSS--}}
@push('css')
{{--Add here extra stylesheets--}}
{{--<link rel="stylesheet" href="/css/app.css">--}}
@endpush

{{--Push extra Scripts--}}
@push('js')
    <script>console.log("Hi, I'm using the laravel-AdminLTE package!");</script>
@endpush