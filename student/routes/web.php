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
/**Nav bar route */
Route::get('/', function () {
    return view('index');
});

/**New proba */
Route::get('/blog/novi', function () {
    return view('blog.blog');
});

/**end news */
Route::get('/jobs', function () {
    return view('jobs.jobs');
});

Route::get('/apartment', function () {
    return view('apartment.apartment');
});
Route::get('/course', function () {
    return view('course.course');
});
Route::get('/apartment-one-room', function (){
    return view ('apartment.details');
});
Route::get('/apartment-details', function (){
    return view ('apartment.apartment-details');
});

Route::get('/loginProba', function (){
    return view ('layouts.loginPage');
});

/**Tags and category */
Route::get('/category', function (){
    return view ('blog.category.create_category');
});
Route::get('/tags', function (){
    return view ('blog.tags.create_tags');
});

/**Edit profile */
Route::get('/edit', function () {
    return view('dashboard.user-dashboard.edit_profile');
});

Route::get('/dashboard', function (){
    return view ('dashboard.admin-home');
});

/** Users routes */
Route::get('/newUser', function (){
    return view ('dashboard.user-dashboard.create-user');
});

/**Login */
Route::post('/userLogin', 'UserController@userLogin');
//------------Logout-------------------------------
Route::get('/logout', 'SessionsController@destroy');
/** Adding data into database */
Route::post('/new_account', 'UserController@store');

/***Delete user */
Route::get('/delete/{id}/user', 'UserController@deleteUser');

/***Retriving data from database */
Route::get('/users', 'UserController@count_user');

/***Edit users data */
Route::get('/user/{user}/edit', 'UserController@editUser');
Route::get('/user_profile/{user}/edit', 'UserController@editUser');

/**Update user data */
Route::put('/user/{user}', 'UserController@update');
Route::put('/user_profile/{user}', 'UserController@update');

/**Status change active<->disabled */
Route::get('/status_change/{user}', 'UserController@statusChange');

/**Password change */
Route::put('/password_change/{user}', 'UserController@updatePassword');

/**Category */
Route::get('/category/create', function (){
    return view ('blog.category.create_category');
});
Route::get('/category', 'CategoryController@index');
Route::post('/category/create/new', 'CategoryController@store');
Route::get('/delete/{id}/category', 'CategoryController@delete');
Route::get('/category/{category}/edit', 'CategoryController@editCategory');
Route::put('/category/{category}/update', 'CategoryController@updateCategory');
Route::get('/category/{id}/default', 'CategoryController@setDefault');
/**End Category */

/**tags */
Route::get('/tag/create', function (){
    return view ('blog.tags.create_tags');
});
Route::get('/tag', 'TagController@index');
Route::post('/tag/create/new', 'TagController@store');
Route::get('/delete/{id}/tag', 'TagController@delete');
Route::get('/tag/{tag}', 'TagController@editTag');
Route::put('/tag/{tag}/edit', 'TagController@updateTag');
/**End tags */


/**
 * Blog routes
 */
Route::post('blog/create','BlogController@store');

Route::get('blog/{post_slug}/edit', 'BlogController@edit');

Route::get('blog/{post_slug}', 'BlogController@getSingle');

Route::get('delete/{id}/blog', 'BlogController@delete');

Route::get('/news', 'BlogController@show')->name('news.show');

Route::put('/blogs/{blog}', 'BlogController@update');

Route::get('/home','BlogController@show_all');

Route::get('/blog','BlogController@index');

Route::get('/blog/{id}/comments', 'BlogController@blogComments');

Route::get('/comments/{id}/delete', 'BlogController@deleteAllComments');

Route::get('/singleComment/{id}/delete', 'BlogController@deleteSingleComment');

Route::delete('/delete/{id}/selected', 'BlogController@deleteSelectedComment');

Route::get('/myblogs', 'BlogController@myBlogs');

/**
 * end blog routes
 */

 /** Poll routes */

 Route::get('/poll', function (){
    return view ('poll.create_poll');
});

 /** Comments route */
 Route::get('/comments/{id}','CommentController@create');

/** Jobs route */
Route::get('/job', function (){
    return view ('jobs.create_job');
});

Route::get('/list-jobs', 'JobController@jobs');
Route::get('/jobs-description/{id}', 'JobController@jobDescription');
Route::post('/job/create', 'JobController@store');
Route::get('/job/create', 'JobController@index');
Route::get('/jobs', 'JobController@activeJobs');
Route::get('/job/{job}/edit', 'JobController@editJob');
Route::put('/job/{job}/update', 'JobController@update');
Route::get('/delete/{id}/job', 'JobController@delete');
Route::get('/myjobs', 'JobController@myJobs');
Route::post('/search/job', 'JobController@filterJob');
Route::get('/search/job', 'JobController@index');

/**Poll routes */
Route::post('/poll/create', 'PollController@create');
Route::get('/list_poll', 'PollController@allPoll');
Route::get('/mypoll', 'PollController@myPoll');
Route::get('/poll/{id}/edit', 'PollController@edit');
Route::put('/poll/{id}/update', 'PollController@update');
Route::get('/vote/{id}/poll', 'PollController@vote');
Route::get('delete/poll', 'PollController@deleteOldPoll');
Route::get('/poll/{id}/status', 'PollController@closePoll');
Route::get('/poll/{id}/result', 'PollController@getResult');
Route::get('/poll/{id}/delete', 'PollController@delete');
