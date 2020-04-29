@extends('layouts.layout')

@section('index')

  <div class="key-container"> 
    @include('component.comedian')
  </div>

  <div class="main-container">
    {{--post--}}
    <div class="post-container">
      @include('component.criticism')
    </div>
    {{--comedian--}}
    <div class="comedian-container"> 
      @include('component.comedian')
    </div>
    {{--sidebar--}}
    <div class="sidebar-container">
      @include('component.sidebar')
    </div>
  </div>
@endsection