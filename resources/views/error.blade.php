@extends('layouts.main_layout')

@section('title')
Gallery
@endsection

@section('css')
<style>
span{
    font-family: Nunito-Bold;
    font-size: 2em;
}
</style>
@endsection

@section('main-content')
<div style="margin-top: 100px"></div>
<div style="width: 100vw; height: 80vh; overflow: hidden" class="d-flex justify-content-center align-items-center flex-column">
    <span class="mb-5">Oops, something went wrong !!!</span>
    <img src="{{ URL::asset('sources/media/images/private/relaxation_moment.png') }}" alt="error picture">
</div>
@endsection

@section('js')
@endsection