<?php 
Route::group(['middleware'=>'auth'],function(){

	Route::get('forum/topic/add/idea&topic_id={id}', ['middleware'=>'check-role:student','uses'=>'IdeaController@index'])->name('addIdea');

	Route::post('forum/topic/add/idea&topic_id={id}', ['middleware'=>'check-role:student','uses'=>'IdeaController@store'])->name('storeIdea');

	Route::get('forum/topic/edit/idea&topic_id={id}&idea_id={ideaId}', ['middleware'=>'check-role:student','uses'=>'IdeaController@edit'])->name('EditIdea');

	Route::post('forum/topic/edit/idea&topic_id={id}&idea_id={ideaId}', ['middleware'=>'check-role:student','uses'=>'IdeaController@update'])->name('updateIdea');


});