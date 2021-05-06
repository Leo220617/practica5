<?php
		Route::get('/',function() { return view('index', ['title'=>'Welcome','login'=>Auth::check()]); });
		
		  Route::resource('/author', 'AutoresController');
		  Route::get('/author/(:number)/delete','AutoresController@destroy');
		Route::resource('/book', 'BookController');
		Route::get('/book/(:number)/delete','BookController@destroy');
		Route::get('/','BookController@index');
    	Route::resource('/editorial','EditorialesController');
		Route::get('/editorial/(:number)/delete','EditorialesController@destroy');

		// Authentication Routes  
		Route::get('login', 
		'LoginController@showLoginForm');
Route::get('loginFails', 
		'LoginController@LoginFails');           
Route::post('login', 
				 'LoginController@login');  
Route::get('logout', 'LoginController@logout');  

// Registration Routes  
Route::get('register', 
   'RegisterController@showRegistrationForm');  
Route::post('register', 
			   'RegisterController@register');
  Route::dispatch();
?>
