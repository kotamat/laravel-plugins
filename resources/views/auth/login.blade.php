@extends('layouts/master')

@section('content')

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal image header">
      <img src="{{asset('assets/images/logo.png')}}" class="image">
      <div class="content">
        Log-in to your account
      </div>
    </h2>
    {!! Form::open(['class' => 'ui large form']) !!}
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="envelope icon"></i>
            {!! Form::email('email', old('email'), ['placeholder' => 'Email address']) !!}
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            {!! Form::password('password', ['placeholder' => 'password']) !!}
          </div>
        </div>
        <button type='submit' class="ui fluid large teal submit button">
            Login
        </button>
      </div>

      @forelse ($errors->all() as $error)
      <div class="ui error attached message">
        <div class="header">
          There was some errors
        </div>
        <ul class="list">
          <li>{{$error}}</li>
        </ul>
      </div>
      @empty

      @endforelse

    {!! Form::close() !!}

    <div class="ui message">
      New to us? {!! Html::link('auth/register', 'Sign Up') !!}
    </div>
  </div>
</div>

@endsection
