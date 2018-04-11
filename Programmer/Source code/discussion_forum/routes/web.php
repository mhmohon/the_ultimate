<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__ . '/web/dashboard.php';

require __DIR__ . '/web/backend_staff.php';

require __DIR__ . '/web/backend_student.php';

require __DIR__ . '/web/backend_topic.php';

require __DIR__ . '/web/backend_idea.php';

require __DIR__ . '/web/backend_comment.php';

require __DIR__ . '/web/backend_report.php';

require __DIR__ . '/web/idea.php';

require __DIR__ . '/web/comment.php';

require __DIR__ . '/web/idea&commentView.php';






Auth::routes();


Route::get('/forum', 'HomeController@index')->name('home');

Route::get('/forum/terms-condition', 'HomeController@terms')->name('terms');

Route::get('/forum/topic/view&topic_id={id}', 'HomeController@topicShow')->name('topicShow');

Route::get('/forum/topic/idea/view&idea_id={id}', 'HomeController@ideaShow')->name('ideaShow');

Route::get('/forum/my-dashboard/', ['middleware'=>'check-role:student|staff','uses'=>'HomeController@myDashboard'])->name('myDashboardShow');

Route::post('/forum/topic/search', 'HomeController@searchTopic')->name('topicSearch');

Route::get('/forum/dashboard/download-idea&idea_id={id}', 'DashboardController@downloadPDF')->name('downloadPDF');

Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/home', function () {
    return redirect()->route('home');
});



