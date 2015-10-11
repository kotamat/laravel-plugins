@extends('layouts.master')

@section('content')
<h1>Create a new message</h1>
{!! Form::open(['route' => 'messages.store', 'class' => 'ui form']) !!}
    <div class="field">
        {!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
        {!! Form::text('subject', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Message Form Input -->
    <div class="field">
        {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
        {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
    </div>

    @forelse($users as $user)
    <div class="inline field">
      <div class="ui checkbox">
          <label title="{!!$user->name!!}"><input type="checkbox" name="recipients[]" value="{!!$user->id!!}">{!!$user->name!!}</label>
      </div>
    </div>
    @empty

    @endforelse

    <!-- Submit Form Input -->
    <div class="field">
        {!! Form::button('Submit', ['type' => 'submit']) !!}
    </div>
</div>
{!! Form::close() !!}
@stop
