<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Packages</title>

    <!-- Bootstrap -->
    {!! Html::style(elixir('assets/css/semantic.css')) !!}
    {!! Html::script(elixir('assets/js/semantic.js')) !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    body {
      padding-top: 55px;
    }
    </style>
  </head>
  <body>
    <div class="ui stackable container menu">
      <div class="item">
        {!! Html::link('/', 'Home') !!}
      </div>
      {!! Html::link('messages', 'Message', ['class' => 'item']) !!}
      {!! Html::link('messages/create', 'New Message', ['class' => 'item']) !!}
    </div>
    <div class="container">
        @yield('content')
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    @if ( Config::get('app.debug') )
      <script type="text/javascript">
      document.write('<script src="//{{$_SERVER['SERVER_NAME']}}:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
      </script>
    @endif
  </body>
</html>
