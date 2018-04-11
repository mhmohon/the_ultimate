<?php 
Route::group(['middleware'=>'auth'],function(){

	Route::post('forum/idea/add/commnet&idea_id={id}', ['middleware'=>'check-role:qac|qam|staff|student','uses'=>'CommentController@store'])->name('addComment');


	Route::get('forum/idea/edit/commnet&idea_id={id}&comment_id={commentId}', ['middleware'=>'check-role:qac|qam|staff|student','uses'=>'CommentController@edit'])->name('EditComment');

	Route::post('forum/idea/edit/commnet&idea_id={id}&comment_id={commentId}', ['middleware'=>'check-role:qac|qam|staff|student','uses'=>'CommentController@update'])->name('updateComment');


});