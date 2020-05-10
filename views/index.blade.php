@extends('layouts.layout')

@section('index')

  <div class="p-index__key"> 
    @include('component.comedian')
  </div>

  <div class="p-index__container">

    <div class="p-index__main">
      {{--post--}}
      <div class="p-index__post-wrapper">
        <h2 class="p-index__title">最新の投稿</h2>
        <div class="p-index__post-container">
          @include('component.criticism')
        </div>
      </div>
      {{--comedian--}}
      <div class="p-index__comedian-wrapper">
        <h2 class="p-index__title">オススメの芸人</h2>
        <div class="p-index__comedian-container"> 
          @include('component.comedian')
        </div>
      </div>
    </div>

    {{--sidebar--}}
    <div class="p-index__sidebar"> 
      <div class="p-index__sidebar-wrapper">
        <h2 class="p-index__title">サイドバー</h2>
        <div class="p-index__sidebar-container">
          @include('component.sidebar')
        </div>
      </div>
    </div>

  </div>
  
@endsection