<?php
Route::view('/','home');
Route::post('/','Home');
Route::post('/damage/{damage}/{gubun}','Home@post')->name('damage.update');
Route::get('/champion/{champion}','Champion');
Route::get('set','Setting');
