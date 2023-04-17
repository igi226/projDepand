<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Blog\BlogController as BlogBlogController;
use App\Http\Controllers\Admin\Cms\CmsController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Departments\DepartmentController;
use App\Http\Controllers\Admin\Employer\EmployerController;
use App\Http\Controllers\Admin\Job\JobController as JobJobController;
use App\Http\Controllers\Admin\Member\MemberController;
use App\Http\Controllers\Admin\Package\PackageController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\AboutUsController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\ChatController;
use App\Http\Controllers\User\ClientController;
use App\Http\Controllers\User\FacilitieController;
use App\Http\Controllers\User\JobController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\Subadmin\SubadminController;

// use Illuminate\Routing\Route;


// Route::get('/', function () {
//     return view('User.Index.index');
// });
Route::get('/optimize', function () {

    Artisan::call('optimize');
    //dd($data);
    return 'optimize';
});
Route::get('/route:clear', function () {

    Artisan::call('route:clear');
    //dd($data);
    return 'route:clear';
});
Route::get('/link', function () {

    Artisan::call('storage:link');
    //dd($data);
    return 'linked';
});
//Admin
Route::get('/admin', [AuthController::class, 'pageLogin']);
Route::post('/admin', [AuthController::class, 'adminLogin']);

Route::group(['prefix' => 'admin', 'middleware' => 'Admincheck'], function () {
    //profile
    Route::get('/admin-profile', [AuthController::class, 'showProfile']);
    Route::post('/admin-profile', [AuthController::class, 'updateProfile']);
    Route::get('/change-password', [AuthController::class, 'showPassword']);
    Route::post('/change-password', [AuthController::class, 'updatePassword']);
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::resource('users', UserController::class); //User means Employee
    Route::get('user/changeS', [UserController::class, 'changeS']);
    Route::get('user/changeEV', [UserController::class, 'changeEV']);

    Route::resource('employers', EmployerController::class);
    Route::resource('sub-admins', SubadminController::class);

    Route::resource('members', MemberController::class);
    Route::resource('blogs', BlogBlogController::class);
    Route::resource('cms', CmsController::class);
    Route::resource('departments', DepartmentController::class);
    Route::get('department/changeS', [DepartmentController::class, 'changeS']);

    Route::resource('jobs', JobJobController::class);
    Route::get('/jobs-applicant-list', [JobJobController::class, 'jobApplicantList'])->name('jobApplicantList');
    Route::get('/comments', [BlogBlogController::class, 'comments']);
    Route::post('/delete-comments', [BlogBlogController::class, 'deleteComments']);
    Route::get('/site-informations', [DashboardController::class, 'siteInfo']);
    Route::post('/site-informations', [DashboardController::class, 'siteInfoUpdate']);
    Route::get('/log-out', [DashboardController::class, 'logOut'])->name('logOut');
    Route::resource('packages', PackageController::class);
    Route::get('/packages/changePS', [PackageController::class, 'changePS'])->name('changePS');
    Route::get('/terms', [PackageController::class, 'termsGet'])->name('termsGet');
    Route::post('/terms&Conditions', [PackageController::class, 'terms'])->name('terms');
    Route::get('/request-Servises', [PackageController::class, 'requestServises'])->name('requestServises');
    Route::delete('/request-Servises/{id}', [PackageController::class, 'requestServisesDelete'])->name('requestServisesDelete');
    Route::get('/request-talent', [PackageController::class, 'requestTalent'])->name('requestTalent');
    Route::get('/request-talent-view/{id}', [PackageController::class, 'requestTalentView'])->name('requestTalentView');

    Route::delete('/request-talent/{id}', [PackageController::class, 'requesttalentDelete'])->name('requesttalentDelete');
    Route::get('/resume-request', [PackageController::class, 'requestresume'])->name('requestresume');
    Route::delete('/request-requestResumeDelete/{id}', [PackageController::class, 'requestResumeDelete'])->name('requestResumeDelete');
    Route::get('/facility-request', [PackageController::class, 'requestFacility'])->name('requestFacility');
    Route::delete('/facility-request-delete/{id}', [PackageController::class, 'requestFacilityDelete'])->name('requestFacilityDelete');
    Route::get('/facility-request-view/{id}', [PackageController::class, 'requestFacilityView'])->name('requestFacilityView');
    Route::get('/patient-referrals-list', [PackageController::class, 'patientReffarlList'])->name('patientReffarlList');
    Route::get('/patient-referrals-list-view/{id}', [PackageController::class, 'patientReffarlView'])->name('patientReffarlView');
    Route::delete('/patient-referrals-delete/{id}', [PackageController::class, 'patientReffarlDelete'])->name('patientReffarlDelete');
});

//user
Auth::routes([
    'verify' => true
]);



Route::middleware(['auth', 'userTypeMiddleware:Employer', 'verified'])->group(function () {
    Route::get('/employer', [App\Http\Controllers\HomeController::class, 'employerHome'])->name('employer.home');
    Route::get('/post-job', [JobController::class, 'postJob'])->name('employer.postJob');
    Route::post('/post-job', [JobController::class, 'storeJob'])->name('employer.storeJob');
    Route::get('/posted-jobs', [JobController::class, 'postedJobs'])->name('employer.postedJobs');
    Route::get('/edit-Job/{slug}', [JobController::class, 'editJob'])->name('employer.editJob');
    Route::post('/edit-Job/{slug}', [JobController::class, 'updateJob'])->name('employer.updateJob');
    Route::delete('/delete-Job/{slug}', [JobController::class, 'deleteJob'])->name('employer.deleteJob');
    Route::get('/applicant-list', [JobController::class, 'applicantList'])->name('employer.applicantList');

    Route::get('/aplicant/job/{slug}', [JobController::class, 'getApplicantByJob'])->name('employer.getApplicantByJob');
    Route::get('/view-applicant/{slug}', [JobController::class, 'viewApplicant'])->name('employer.viewApplicant');





});
Route::get('/posted-jobs', [JobController::class, 'postedJobs'])->name('employer.postedJobs');
Route::get('/view-Job/{slug}', [JobController::class, 'viewJob'])->name('employer.viewJob');
Route::get('/terms-conditions', [AboutUsController::class, 'conditions'])->name('conditions');
Route::get('/Job-notification/{slug}', [JobController::class, 'viewJobn'])->name('employer.viewJobn');



Route::middleware(['auth', 'userTypeMiddleware:Employee', 'verified'])->group(function () {
    Route::get('/employee', [App\Http\Controllers\HomeController::class, 'employeeHome'])->name('employee.home');
    Route::get('/my-applications', [JobController::class, 'myApplication'])->name('employee.myApplication');
    Route::delete('/my-applications/delete/{id}', [JobController::class, 'myApplicationDelete'])->name('employee.myApplicationDelete');
    Route::get('/sortlisted-applications', [JobController::class, 'sotilistedApplication'])->name('employee.sotilistedApplication');
    Route::post('job/addToFavorite', [JobController::class, 'addToFavorite'])->name('employee.addToFavorite');
    Route::get('/favourite-jobs', [JobController::class, 'favouriteJobs'])->name('employee.favouriteJobs');




});
Route::middleware(['auth'])->group(function () {
    Route::post('/profile-update/{slug}', [HomeController::class, 'profileUpdate'])->name('profile.update');
    Route::get('/update-academic-info', [HomeController::class, 'updateAcademic']);
    Route::get('/update-Company-info', [HomeController::class, 'updateCompany']);
    Route::post('/delete-academic-info', [HomeController::class, 'deleteAcademic']);
    Route::post('/delete-company-history', [HomeController::class, 'removeCompany']);
    Route::post('/apply-fot-the-position', [JobController::class, 'applyJob'])->name('employee.applyJob');
    Route::get('/notifications', [JobController::class, 'notifications'])->name('notifications');
    Route::delete('/delete-notification/{id}', [JobController::class, 'deleteNotifications'])->name('deleteNotifications');
    Route::get('/chat', [ChatController::class, 'chat'])->name('chat');
    Route::post('/send-msg', [ChatController::class, 'sendMsg'])->name('sendMsg');
    Route::get('/getmsg/{to_user_id}', [ChatController::class, 'getmsg'])->name('getmsg');
    Route::post('/upload-image', [HomeController::class, 'uploadImage'])->name('uploadImage');
    Route::get('/all-jobs', [JobController::class, 'allJobs'])->name('employee.allJobs');
    Route::post('/care-service', [AboutUsController::class, 'careService'])->name('careService');
    Route::get('/job/indutry/{slug}', [JobController::class, 'getJobByIndustry'])->name('employee.getJobByIndustry');
    Route::get('facilities', [FacilitieController::class, 'facilities']);
    Route::get('resources', [FacilitieController::class, 'resources']);




});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('patient-referrals', [FacilitieController::class, 'patientReferrals']); //
Route::post('patient-referrals', [FacilitieController::class, 'patientReferralsPost'])->name('patient.refferel'); //
Route::get('client', [ClientController::class, 'client']);
Route::post('request-talent', [ClientController::class, 'requestTalent']);
Route::get('about-us', [AboutUsController::class, 'aboutUs']);
Route::get('packages', [AboutUsController::class, 'packages'])->name('packages');
Route::get('blog', [BlogController::class, 'blog']);
Route::get('view-blog/{slug}', [BlogController::class, 'view']);

// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::middleware(['verified'])->group(function () {
    Route::get('job', [JobController::class, 'job']);
    Route::post('post-comment/{blog_id}', [BlogController::class, 'comment']);
    Route::post('parent-comment/{comment_id}', [BlogController::class, 'parentComment'])->name('parent.reply');
    Route::get('home-Care-Solutions', [AboutUsController::class, 'homeCareSol']);
    Route::get('home-health-Solutions', [AboutUsController::class, 'homeHealthSol']);
    Route::post('facility-intake-forms', [FacilitieController::class, 'facility_intake_forms']);
    Route::post('submit-resume', [FacilitieController::class, 'submitResume']);
    Route::get('post-a-job', [FacilitieController::class, 'postAjob']);
});
Route::get('/applicant/changeS', [JobController::class, 'applicantChangeS'])->name('employer.applicantChangeS');
Route::delete('/applicant/delete/{id}', [JobController::class, 'applicantDelete'])->name('employer.applicantDelete');