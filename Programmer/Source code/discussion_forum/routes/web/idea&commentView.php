<?php
Route::group(['middleware'=>'auth'],function(){

	Route::get('/forum/all-idea/view/most-popular', ['middleware'=>'check-role:admin|qac|qam|staff','uses'=>'HomeController@most_idea_popular'])->name('mostIdeaPopular');

	Route::get('/forum/all-idea/view/sort_by={Name}&order={orderName}', ['middleware'=>'check-role:admin|qac|qam|staff','uses'=>'HomeController@most_idea_view'])->name('mostIdeaView');

	Route::get('/forum/all-idea/view/latest', ['middleware'=>'check-role:admin|qac|qam|staff','uses'=>'HomeController@latest_idea'])->name('latestIdea');

	Route::get('/forum/all-comment/view/latest', ['middleware'=>'check-role:admin|qac|qam|staff','uses'=>'HomeController@latest_comment'])->name('latestComment');


});