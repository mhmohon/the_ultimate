<?php 
Route::group(['middleware'=>'auth'],function(){


	Route::get('forum/dashboard/view/idea', ['middleware'=>'check-role:admin|qam|qac','uses'=>'BackendIdeaController@index'])->name('viewIdea');

	Route::get('forum/dashboard/idea/edit&idea_id={id}', ['middleware'=>'check-role:admin|qam','uses'=>'BackendIdeaController@edit'])->name('editIdea');

	Route::post('forum/dashboard/idea/edit&idea_id={id}', ['middleware'=>'check-role:admin|qam','uses'=>'BackendIdeaController@update'])->name('IdeaUpdate');


});