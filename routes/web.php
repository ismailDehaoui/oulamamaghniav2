<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/deaths', function(){
    return view('deaths');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




/*
 * Admin routes: 
 *  * Admin Login;
 *  * Admin dashboard;
 *  * Update :
 *     * Admin password;
 *     * Admin details;
 *  * Admin logout;
*/
// Route::get('/admin/dashboard', 'App\Http\Controllers\Admin\AdminController@dashboard');

Route::prefix('/admin')->namespace('Admin')->group(function(){

    Route::match(['get','post'],'login', 'AdminController@login');
    
   
    Route::group(['middleware' => ['admin']],function(){
       
        Route::get('dashboard', 'AdminController@dashboard');     
        
        Route::match(['get','post'],'update-admin-password', 'AdminController@upadateAdminPassword');

        Route::post('check-admin-password', 'AdminController@checkAdminPassword');     

        Route::match(['get','post'],'update-admin-details', 'AdminController@upadateAdminDetails');
        
        Route::match(['get','post'],'update-quran-teacher-details/{slug}', 'AdminController@upadateQuranTeacherDetails');
        
        Route::get('school' ,'SchoolController@school');
       
        Route:: match(['get', 'post'], 'add-edit-school/{id?}', 'SchoolController@addEditSchool');
       
        
        Route::get('category' ,'QuranCategoryController@category');

        Route:: match(['get', 'post'], 'add-edit-category/{id?}', 'QuranCategoryController@addEditcategory');
        
        Route::get('secretary' ,'SecretaryController@secretary');
        Route:: match(['get', 'post'], 'add-secretary', 'SecretaryController@addSecretary');
        Route::get('delete-secretary/{id?}', 'SecretaryController@delete');


        Route::get('quran-teacher' ,'QuranTeacherController@quran_teacher');        
        Route:: match(['get', 'post'], 'add-edit-quran-teacher/{id?}', 'QuranTeacherController@addEditQuranTeacher');
        Route::get('delete-quran-teacher/{id?}', 'QuranTeacherController@delete');

        Route::get('parent' ,'ParentController@parent');        
        Route:: match(['get', 'post'], 'add-parent', 'ParentController@addParent');
        Route:: match(['get', 'post'], 'edit-parent/{id?}', 'ParentController@editParent');
         Route::get('delete-parent/{id?}', 'ParentController@deleteParent');
        
        Route::get('quran-student' ,'QuranStudentController@quran_student');        
        Route:: match(['get', 'post'], 'add-quran-student/', 'QuranStudentController@addQuranStudent');
        Route:: match(['get', 'post'], 'edit-quran-student/{id?}', 'QuranStudentController@editQuranStudent');
        Route::get('delete-quran-student/{id?}', 'QuranStudentController@deleteQuranStudent');
        Route::get('profile/{id?}', 'QuranStudentController@profile');
        
        Route::get('quran-subscription' ,'QuranSubscriptionController@quranSubscription');
        Route::get('next-date-renwal/{id?}','QuranSubscriptionController@Updatesubscription');
        
        
        Route::post('update-teacher-status', 'QuranTeacherController@updateTeacherStatus');
        
        Route::get('logout', 'AdminController@logout');
    });
});
/*
 * Teacher routes: 
 *  * Teacher Login;
 *  * Teacher dashboard;
 *  * Update :
 *     * Teacher password;
 *     * Teacher details;
 *  * Teacher logout;
*/
// Route::prefix('/quran-teacher')->namespace('admin')->group(function(){

//     Route::match(['get','post'],'login', 'QuranTeacherController@login');
    
   
//     Route::group(['middleware' => ['Quran_Teacher']],function(){
       
//         Route::get('dashboard', 'QuranTeacherController@dashboard');     
        
//         Route::match(['get','post'],'update-teacher-password', 'QuranTeacherController@upadateTeacherPassword');

//         Route::post('check-teacher-password', 'QuranTeacherController@checkTeacherPassword');     

//         Route::match(['get','post'],'update-teacher-details', 'QuranTeacherController@upadateTeacherDetails');
        
//         Route::get('logout', 'QuranTeacherController@logout');
//     });
// });