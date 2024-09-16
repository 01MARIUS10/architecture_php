<?php

Route::get('/login',"UserController","login");
Route::post('/auth',"UserController","auth");

Route::get('/deconnection',"UserController","logout");


Route::get('/home',"UserController","home",['guard'=>'Auth']);

Route::get('/new',"UserController","new",['guard'=>'Auth']);
Route::post('/register',"UserController","register",['guard'=>'Auth']);

Route::get('/edit/{id}',"UserController","edit",['guard'=>'Auth']);
Route::post('/update/{id}',"UserController","update",['guard'=>'Auth']);

Route::get('/delete/{id}',"UserController","delete",['guard'=>'Auth']);

Route::redirect('/','/home');
Route::end();
?>
