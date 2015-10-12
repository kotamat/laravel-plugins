var elixir = require('laravel-elixir');
var gulp = require('gulp');

require('laravel-elixir-livereload');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
  mix.livereload();
})

//semantic
elixir(function(mix) {

 mix
     .copy('bower_components/semantic/dist/semantic.min.js', 'public/assets/js/semantic.min.js')
     .copy('bower_components/semantic/dist/semantic.min.css', 'public/assets/css/semantic.min.css')
     .copy('bower_components/semantic/examples/assets/images/', 'public/assets/images/')
     .sass([
        'app.scss',
     ], 'public/css')
     .version([
        'public/css/app.css',
        'public/assets/js/semantic.min.js',
        'public/assets/css/semantic.min.css',
     ])
 ;

});

gulp.task('fonts', function() {
 gulp.src(['bower_components/semantic/dist/themes/default/assets/fonts/**/*'])
     .pipe(gulp.dest('public/build/assets/css/themes/default/assets/fonts'));

 gulp.src(['bower_components/fontawesome/fonts/**/*'])
     .pipe(gulp.dest('public/build/assets/css/fonts'));
});
