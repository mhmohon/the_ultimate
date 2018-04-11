<?php 
Route::group(['middleware'=>'auth'],function(){


	Route::get('forum/dashboard/view/all-staff', ['middleware'=>'check-role:admin|qam','uses'=>'BackEndStaffController@index'])->name('viewStaff');

	Route::get('forum/dashboard/staff/edit&staff_id={id}', ['middleware'=>'check-role:admin|qam','uses'=>'BackEndStaffController@show'])->name('editStaff');

	Route::post('forum/dashboard/staff/edit&staff_id={id}', ['middleware'=>'check-role:admin|qam','uses'=>'BackEndStaffController@update'])->name('staffUpdate');
});