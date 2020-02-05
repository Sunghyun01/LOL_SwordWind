<?php
Route::view('/','home');
Route::post('/','Home');
Route::post('/damage/{champion}/{gubun}','Home');
Route::get('set','Setting');
