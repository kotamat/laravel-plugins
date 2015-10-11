@extends('layouts.master')

@section('content')

  <div class="ui comments">
    <h1 class="ui dividing header"></h1>
    @foreach($thread->messages as $message)
    <div class="comment">
      <a href="" class="avatar">
        <img src="//www.gravatar.com/avatar/{!! md5($message->user->email) !!}?s=64" alt="{!! $message->user->name !!}" class="img-circle">
      </a>
      <div class="content">
        <a href="" class="author">
          {{ $message->user->name }}
        </a>
        <div class="metadata">
          <span class="date">
            Posted {{ $message->created_at->diffForHumans() }}
          </span>
        </div>
        <div class="text">
          {{ $message->body }}
        </div>
        <div class="actions">
          <a href="" class="reply">Reply</a>
        </div>
      </div>
    </div>
    @endforeach
    {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT', 'class' => 'ui reply form']) !!}
      <div class="field">
        {!! Form::textarea('message') !!}
      </div>

      @if($users->count() > 0)
      @foreach($users as $user)
      <div class="inline field">
        <div class="ui checkbox">
          {!! Form::checkbox('recipients[]', $user->id, null, ['id' => 'recipient_'. $user->id ]) !!}
          {!! Form::label('recipient_'. $user->id, $user->name) !!}
        </div>
      </div>
        @endforeach
      @endif

      <button type="submit" class="ui blue labeled submit icon button">
        <i class="icon edit"></i>
      </button>
    {!! Form::close() !!}
  </div>
@stop
