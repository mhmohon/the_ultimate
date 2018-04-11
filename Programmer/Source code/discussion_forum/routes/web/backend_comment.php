<?php 
Route::group(['middleware'=>'auth'],function(){


	Route::get('forum/dashboard/view/comment', ['middleware'=>'check-role:admin|qam','uses'=>'BackEndCommentController@index'])->name('viewComment');

	Route::get('forum/dashboard/comment/edit&comment_id={id}', ['middleware'=>'check-role:admin|qam','uses'=>'BackEndCommentController@show'])->name('editComment');

	Route::post('forum/dashboard/comment/edit&comment_id={id}', ['middleware'=>'check-role:admin|qam','uses'=>'BackEndCommentController@update'])->name('CommentUpdate');



});