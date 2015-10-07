<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::pattern('provider', 'github|twitter|facebook');

Route::get('/', function()
{
    if (!\Auth::check()) {
        // ログイン済でなければリダイレクト
        return 'こんにちは ゲストさん. '
        . link_to('github/authorize', 'Github でログイン.')
        . link_to('twitter/authorize', 'Twitter でログイン.')
        . link_to('facebook/authorize', 'Facebook でログイン.');
    }
    return 'ようこそ ' . \Auth::user()->name . 'さん!';
});

Route::get('{provider}/authorize', function($provider)
{
    // ソーシャルログイン処理
    return \Socialite::with($provider)->redirect();
});

Route::get('{provider}/login', function($provider)
{
    // ユーザー情報取得
    $userData = \Socialite::with($provider)->user();
    // ユーザー作成
    $user = App\Models\User::firstOrCreate([
            'name' => $userData->nickname,
            'email'    => $userData->email,
            'avatar'   => $userData->avatar
    ]);
    \Auth::login($user);

    return redirect('/');
});

Route::group(['middleware' => 'auth'], function () {
  Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
  });
});


Route::group(['prefix' => 'excel'], function() {
    Route::get('/', ['as' => 'excel', 'uses' => 'ExcelController@index']);
    Route::get('create', ['as' => 'excel.create', 'uses' => 'ExcelController@create']);
});
