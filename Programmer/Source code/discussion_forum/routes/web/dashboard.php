<?php
Route::group(['middleware'=>'auth'],function(){

	Route::get('/forum/dashboard', ['middleware'=>'check-role:admin|qac|qam','uses'=>'DashboardController@index'])->name('dashboardHome');

	Route::get('/forum/dashboard/my-profile', ['middleware'=>'check-role:admin|qac|qam','uses'=>'DashboardController@my_profile'])->name('dashboardProfile');

	Route::post('/forum/dashboard/my-profile&id={id}', ['middleware'=>'check-role:admin|qac|qam','uses'=>'DashboardController@my_profile_update'])->name('editInfo');

	//For Idea notification
	Route::get('mark-as-read/idea_id={idea_id}&notify_id={notify_id}', 'DashboardController@show_read')->name('IdeaMarkRead');

	Route::get('mark-as-read/all/idea', 'DashboardController@notifyReadAll')->name('markAsReadAll');

});