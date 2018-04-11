<?php 
Route::group(['middleware'=>'auth'],function(){

	Route::get('forum/dashboard/add/topic', ['middleware'=>'check-role:admin|qam','uses'=>'TopicController@create'])->name('addTopic');

	Route::post('forum/dashboard/add/topic', ['middleware'=>'check-role:admin|qam','uses'=>'TopicController@store'])->name('storeTopic');

	Route::get('forum/dashboard/view/topic', ['middleware'=>'check-role:admin|qam|qac','uses'=>'TopicController@index'])->name('viewTopic');

	Route::get('forum/dashboard/topic/edit&topic_id={id}', ['middleware'=>'check-role:admin|qam','uses'=>'TopicController@edit'])->name('editTopic');

	Route::post('forum/dashboard/topic/edit&topic_id={id}', ['middleware'=>'check-role:admin|qam','uses'=>'TopicController@update'])->name('updateTopic');

	Route::get('forum/dashboard/topic/delete&topic_id={id}', ['middleware'=>'check-role:admin|qam','uses'=>'TopicController@destroy'])->name('topicDelete');

});