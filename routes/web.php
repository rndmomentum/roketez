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

Route::get('/', 'WelcomeController@welcome');

Auth::routes();
// Auth::routes(['verify' => true]);

/*
|--------------------------------------------------------------------------
| Home Controller
|--------------------------------------------------------------------------
|
*/

Route::get('explore', 'HomeController@index')->name('home');
Route::get('explore/course', 'HomeController@search_courses');

// User Courses
// Route::get('mycourses', 'HomeController@mycourses');

// Course Only
Route::get('course/{id}', 'HomeController@courses');
Route::get('lesson/{id}', 'HomeController@lessons');

// User Profile
Route::get('myaccount', 'HomeController@myaccount');
Route::post('profile/update/{id}', 'HomeController@update_myaccount');

// Purchase History
Route::get('subscription-history', 'HomeController@subscription_history');

// Failed Payment Page
Route::get('payment-failed', 'HomeController@failed_payment_page');

// Canceled Page
Route::get('account-inactive', 'HomeController@inactive_account_page');

// Ticket Support
Route::get('ticket-support', 'HomeController@ticket_support');

// Sign Out
Route::get('signout', 'HomeController@signout');

// Choose Interest Page
Route::get('choose-interest', 'HomeController@choose_interest');
Route::post('choose-interest/store', 'HomeController@store_interest');

// Categories
Route::get('categories', 'HomeController@categories');


/*
|--------------------------------------------------------------------------
| Signup Controller
|--------------------------------------------------------------------------
|
*/

Route::get('signup', 'SignUpController@afterverify');
Route::get('signup/pricing', 'SignUpController@pricing');
Route::get('signup/payment/{id}', 'SignUpController@payment');



/*
|--------------------------------------------------------------------------
| Checkout Controller
|--------------------------------------------------------------------------
|
*/

// Membership Checkout
Route::post('checkout/membership/{id}', 'CheckoutController@checkout_for_membership');

// Cancel Subscription
Route::post('cancel/subscription', 'CheckoutController@cancel_subscription');



/*
|--------------------------------------------------------------------------
| Admin Controller
|--------------------------------------------------------------------------
|
*/

Route::get('admin', 'AdminController@home');

// Admin Sign In
Route::get('admin/login', 'AdminController@login');
Route::post('admin/login/post', 'AdminController@login_redirect');

// Admin Sign Out
Route::get('admin/logout', 'AdminController@logout');

// Pages
Route::get('admin/courses', 'AdminController@courses');
Route::get('admin/lessons', 'AdminController@lessons');
Route::get('admin/users', 'AdminController@users');
Route::get('admin/memberships', 'AdminController@memberships');
Route::get('admin/subscriptions', 'AdminController@subscriptions');
Route::get('admin/instructor', 'AdminController@instructor');
Route::get('admin/role', 'AdminController@admin_role');
Route::get('admin/user/export-data', 'UserController@export_data_page');

// Ticket Support
Route::get('admin/ticket-support', 'AdminController@ticket_support');
Route::get('admin/ticket-support/{id}', 'AdminController@show_ticket_support');
Route::post('admin/ticket-support/reply/{id}', 'AdminController@reply_ticket_support');

// Role
Route::get('admin/role/create', 'AdminController@create');
Route::post('admin/role/post', 'AdminController@store');
Route::get('admin/role/list', 'AdminController@index');


/*
|--------------------------------------------------------------------------
| User Controller
|--------------------------------------------------------------------------
|
*/

// Create
Route::get('admin/user/create', 'UserController@create');
Route::post('admin/user/store', 'UserController@store');

// Index
Route::get('admin/user/list', 'UserController@index');

// Update
Route::get('admin/user/edit/{id}', 'UserController@edit');
Route::post('admin/user/update/{id}', 'UserController@update');

// Destroy
Route::get('admin/user/delete/{id}', 'UserController@destroy');
Route::post('admin/payment-history/{id}', 'UserController@destroy_payment');

// Search
Route::get('admin/user/search', 'UserController@search');

// Generate Payment History
Route::post('admin/user/edit/generate-payment/{id}', 'UserController@generate_payment');

// Active Users
Route::get('admin/user/list/{status}', 'UserController@user_status');

// Export User
Route::post('admin/user/export-data/export', 'UserController@export_user');

// Cancel Subscription
Route::post('admin/cancel-subscription/{id}', 'UserController@cancel_subscription');

// Delete Subscription
Route::post('admin/delete-subscription/{id}', 'UserController@delete_subscription');

// Sync payment status
Route::post('admin/sync-payment-history-status/{id}/{order_id}', 'UserController@sync_payment_status');

// Update created at
Route::post('admin/update-created-at/{id}', 'UserController@update_created_at');

// Date filter
Route::get('admin/user/date-filter', 'UserController@date_filter');
Route::get('admin/user/date-filter/update', 'UserController@get_date_filter');

/*
|--------------------------------------------------------------------------
| Course Controller
|--------------------------------------------------------------------------
|
*/

// Index
Route::get('admin/courses/list', 'CourseController@index');

// Create
Route::get('admin/courses/create', 'CourseController@create');
Route::post('admin/courses/post', 'CourseController@store');

// Update
Route::get('admin/courses/edit/{id}', 'CourseController@edit');
Route::post('admin/courses/update/{id}', 'CourseController@update');

// Destroy
Route::get('admin/course/delete/{id}', 'CourseController@destroy');

// Search
Route::get('admin/course/search', 'CourseController@search');


/*
|--------------------------------------------------------------------------
| Membership Controller
|--------------------------------------------------------------------------
|
*/

// Index
Route::get('admin/memberships/list', 'MembershipController@index');

// Create
Route::get('admin/memberships/create', 'MembershipController@create');
Route::post('admin/memberships/post', 'MembershipController@store');

// Update
Route::get('admin/memberships/edit/{id}', 'MembershipController@edit');
Route::post('admin/memberships/update/{id}', 'MembershipController@update');

// Destroy
Route::get('admin/membership/delete/{id}', 'MembershipController@destroy');


/*
|--------------------------------------------------------------------------
| Lesson Controller
|--------------------------------------------------------------------------
|
*/

// Index
Route::get('admin/lessons/list', 'LessonController@index');

// Create
Route::get('admin/lessons/create', 'LessonController@create');
Route::post('admin/lessons/post', 'LessonController@store');

// Update
Route::get('admin/lessons/edit/{id}', 'LessonController@edit');
Route::post('admin/lessons/update/{id}', 'LessonController@update');

// Destroy
Route::get('admin/lesson/delete/{id}', 'LessonController@destroy');

// Search
Route::get('admin/lesson/search', 'LessonController@search');


/*
|--------------------------------------------------------------------------
| Subscription Controller
|--------------------------------------------------------------------------
|
*/

// Index
Route::get('admin/subscriptions/list', 'SubscriptionController@index');


/*
|--------------------------------------------------------------------------
| Instructor Controller
|--------------------------------------------------------------------------
|
*/

// Index
Route::get('admin/instructor/list', 'InstructorController@index');

// Create
Route::get('admin/instructor/create', 'InstructorController@create');
Route::post('admin/instructor/post', 'InstructorController@store');

// Update
Route::get('admin/instructor/edit/{id}', 'InstructorController@edit');
Route::post('admin/instructor/update/{id}', 'InstructorController@update');

// Destroy
Route::get('admin/instructor/delete/{id}', 'InstructorController@destroy');


/*
|--------------------------------------------------------------------------
| Stripe Controller
|--------------------------------------------------------------------------
|
*/

Route::get('admin/api-key', 'StripeController@create');
Route::post('admin/stripe-api/update', 'StripeController@store');


/*
|--------------------------------------------------------------------------
| Ticket Support Controller
|--------------------------------------------------------------------------
|
*/

Route::post('ticket-support/post', 'TicketSupportController@store');
Route::get('ticket-support/{id}', 'TicketSupportController@show');
Route::post('ticket-support/reply/{id}', 'TicketSupportController@update');