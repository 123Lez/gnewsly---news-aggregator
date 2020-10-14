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

Route::get('/', function () {
    // return view('auth.login');
    return redirect('mainpage');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mainpage','MainpageController@fetchArticles');
Route::get('/articleview/{id}','MainpageController@viewArticle');
// Route::get('/menu','MenuController@index');
Route::get('/SourceArticles','SearchForArticleController@showSource_content');
// Route::get('/view/{source}','MenuController@fetchchoosenArticle');
Route::get('/Nextpage','MainpageController@fetchArticles');
// Route::get('/auth.login','loginController@login');
Route::get('/fetchArticle','SearchForArticleController@search_article');
// Route::get('view/{source}','SearchForArticleController@showSource_content');
Route::get('/show_source','SearchForArticleController@showSource_content');
Route::get('/category','SearchForArticleController@searchCategory');
Route::post('/sign_up','EmailController@sendInitial_email');
Route::get('/confirm_sign_up', 'EmailController@confirmEmail');
Route::get('/email_Notification','EmailController@emailNotification');
Route::get('/sendToken','MainpageController@send_User_Token');
Route::get('/push_notification','PushNotificationController@send_Notification');
Route::get('/survey','SurveyController@show');
Route::get('/send_survey','SurveyController@sendSurvey');
Route::get('/takeSurvey','SurveyController@index');