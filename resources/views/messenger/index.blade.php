@extends('layouts.master')

@section('content')
    @if (Session::has('error_message'))
        <div class="alert alert-danger" role="alert">
            {!! Session::get('error_message') !!}
        </div>
    @endif
    @if($threads->count() > 0)
        @foreach($threads as $thread)

        <div class="ui card">
          <div class="content">
            {!! link_to('messages/' . $thread->id, $thread->subject) !!}
          </div>
          <div class="image">
            <img src="" alt="" class="ui wireframe image">
          </div>
          <div class="content">
            <a href="" class="header"></a>
            <div class="meta">
              {!! $thread->creator()->name !!}
            </div>
            <div class="description">
              {!! $thread->latestMessage->body !!}
            </div>
            <div class="summary">
              {!! $thread->participantsString(Auth::id()) !!}
            </div>
          </div>
        </div>

        @endforeach
    @else
        <p>Sorry, no threads.</p>
    @endif
@stop
