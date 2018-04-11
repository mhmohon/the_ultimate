<?php 
Route::group(['middleware'=>'auth'],function(){


	Route::get('forum/dashboard/view/all-student', ['middleware'=>'check-role:admin|qam','uses'=>'BackEndStudentController@index'])->name('viewStudent');

	Route::get('forum/dashboard/student/edit&student_id={id}', ['middleware'=>'check-role:admin|qam','uses'=>'BackEndStudentController@edit'])->name('editStudent');

	Route::post('forum/dashboard/student/edit&student_id={id}', ['middleware'=>'check-role:admin|qam','uses'=>'BackEndStudentController@update'])->name('studentUpdate');


});