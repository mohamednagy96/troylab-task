<?php

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::namespace('Admin\Auth')->name('admin.')->prefix('admin')->group(function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login.show');
    Route::post('login', 'LoginController@login')->name('login');
});
Route::post('admin/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');


Route::namespace('Teacher\Auth')->name('teacher.')->prefix('teacher')->group(function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login.show');
    Route::post('login', 'LoginController@login')->name('login');
});
Route::post('teacher/logout', 'Teacher\Auth\LoginController@logout')->name('teacher.logout');

Route::get('api/v1/generalSearch', 'Api\V1\GeneralSearchController@generalSearch');

Route::group(['middleware'=>'auth:admin,teacher'],function(){
    Route::get('questions/{model_type}/{model_id}/essay/export', 'ExcelController@exportEssayQuestion')->name('essay.export');
    Route::post('questions/{model_type}/{model_id}/essay/import', 'ExcelController@importEssayQuestion')->name('essay.import');
    Route::get('questions/{model_type}/{model_id}/choose/export', 'ExcelController@exportChooseQuestion')->name('choose.export');
    Route::post('questions/{model_type}/{model_id}/choose/import', 'ExcelController@importChooseQuestion')->name('choose.import');
    Route::get('codes/generate', 'PdfController@createPDF')->name('generate.code.pdf');

});


// Route::get('/test', 'User\HomePageController@test');

// Route::namespace('User\Auth')->group(function () {
//     Route::get('register', 'RegisterController@showRegistrationForm')->name('register_page');
//     Route::post('register', 'RegisterController@register')->name('register.store');
//     Route::get('login', 'LoginController@showLoginForm')->name('login_page');
//     Route::post('login', 'LoginController@login')->name('login.store');
// });
// Route::group(['namespace'=>'User','middleware'=>'seoGenerator'],function()
// {
//     Route::auth();
//     Route::get('/','HomePageController@index')->name('home_page')->middleware('userProfile');
//     Route::get('/contact','ContactController@index')->name('contact_page');
//     Route::post('/contacts','ContactController@store')->name('contact.store');
//     Route::get('page/{slug}', 'PageController@show')->name('page.show');
//     Route::get('/courses','CourseController@index')->name('courses_page');
//     Route::get('/courses/{id}','CourseController@show')->name('course.show');
//     // Route::get('/courses','CourseController@index')->name('courses_page');
//     Route::get('search', 'PageController@search')->name('page.search');


//     Route::middleware(['auth'])->group(function () {

//         Route::get('/subscriptions/{type}/{id}','SubscriptionController@subscription')->name('subscriptions.index');
//         Route::post('/subscriptions/{type}/{id}','SubscriptionController@storeSubscription')->name('subscription.store');

//         Route::get('/lectures/{id}','LectureController@show')->name('lecture.show');
//         Route::get('/lectures/{id}/videos/{content}','LectureController@video')->name('videos');

//         Route::get('/exams/{exam}/info', 'ExamController@info')->name('exams.info');
//         Route::post('/exams/{exam}/start', 'ExamController@start')->name('exams.start');
//         Route::get('/exams/{exam}', 'ExamController@index')->name('exams.index');
//         Route::post('/exams/{exam}/finish', 'ExamController@finish')->name('exams.finish');

//         Route::get('profile','ProfileController@edit')->name('profile_page');
//         Route::post('profile','ProfileController@update')->name('profile.update');
//         Route::get('profile/exams', 'ProfileController@historyExam')->name('exams.history');
//         Route::get('profile/subscriptions', 'ProfileController@historySubscription')->name('subscription.history');
//         Route::get('profile/changepassword','ProfileController@showChangePasswordForm')->name('change_page');
//         Route::post('profile/changepassword','ProfileController@ChangePassword')->name('changepassword');

//         //video
//         Route::get('/videos/{video}', "VideoController@show")->name('videos.playlist');
//         Route::get('/videos/{video}/keys/{key}', "VideoController@key")->name('videos.key');

//     });

 //   /*
//     !! leave this route in the end of routes
 //   */
//     Route::get('{slug}', 'PageController@index')->name('page.index');

// });


Route::get('/get-course-list',function(Request $request){
    $courses = Course::where('teacher_id',$request->teacher_id)->get()->pluck('name','id')->toArray();
    return response()->json($courses);
});

