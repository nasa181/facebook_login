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
Route::get('/', 'loginManager@firstPage');
Route::post('/','loginManager@checkID');
//
//Route::get('logout', 'loginManager@getLogout');
//Route::get('testLogin','loginManager@getLogin');
//Route::get('createNewUser','loginManager@getNewUser');
//Route::post('createNewUser','loginManager@postForm');
















//Route::get('/', function()
//{
//    $data = array();
//
//    if (Auth::check()) {
//        $data = Auth::user();
//    }
//    return view('user', array('data'=>$data));
//});

Route::get('logout', function() {
    Auth::logout();
    return redirect('/');
});


Route::get('login/fb', function() {
    $facebook = new Facebook(Config::get('facebook'));
    $params = array(
        'redirect_uri' => url('/login/fb/callback'),
        'scope' => 'email',
    );
    return redirect($facebook->getLoginUrl($params));
});





Route::get('login/fb/callback', function() {
    $code = Input::get('code');
    if (strlen($code) == 0) return redirect('/')->with('message', 'There was an error communicating with Facebook');

    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();

    if ($uid == 0) return redirect('/')->with('message', 'There was an error');

    $me = $facebook->api('/me');

    $profile = Profile::whereUid($uid)->first();
    if (empty($profile)) {

        $user = new User;
        $user->name = $me['first_name'].' '.$me['last_name'];
        $user->email = $me['email'];
        $user->photo = 'https://graph.facebook.com/'.$me['username'].'/picture?type=large';

        $user->save();

        $profile = new Profile();
        $profile->uid = $uid;
        $profile->username = $me['username'];
        $profile = $user->profiles()->save($profile);
    }

    $profile->access_token = $facebook->getAccessToken();
    $profile->save();

    $user = $profile->user;

    Auth::login($user);

    return redirect('testLogin')->with('message', 'Logged in with Facebook');
});