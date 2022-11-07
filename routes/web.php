<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\StaffAuthController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\HealthServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\TimeSlotController;
use App\Http\Controllers\MailerController;
use App\Models\Clinic;
use App\Models\Image;
use Illuminate\Http\Request;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/clinic', function () {

    // if ($req->input('search')) {
    //     $clinics = Clinic::where('name', 'LIKE', '%'.$req->input('search').'%')->paginate(5);
    // } else {
    //     $clinics = Clinic::paginate(5);
    // }
    return view('user.clinicList',[
        'clinics' => Clinic::paginate(5),
        'images' => Image::all(),
        //dd( Image::all()->where('clinic_id')),
    ]);
})->name('clinic');

Route::post('/clinic', function(Request $req){

    //dd($req->input('search'));
    //if ($req->input('search')) {
        //$clinics = Clinic::where('name', 'LIKE', '%'.$req->input('search').'%')->get();
    // } else {
    //     $clinics = Clinic::paginate(5);
    // }
    return view('user.clinicList',[
        'clinics' => Clinic::where('name', 'LIKE', '%'.$req->input('search').'%')->paginate(5),
        'images' => Image::all(),
        //dd( Image::all()->where('clinic_id')),
    ]);
})->name('clinicSearch');

Route::resource('clinics', ClinicController::class);

Route::get('/AboutUs', function() {
    return view('user.aboutUs');
}) -> name('aboutUs');

// Route::get('/profile', function () {
//     return view('user.profile');
// });

// Route::get('/appointment', function () {
//     return view('user.appointment');
// });

Route::get('/admin', function () {
    return view('adminLayout');
});

//authencation process
//user
Route::get('/', [UserAuthController::class, 'index'])
    ->name('user.home');
    //->middleware('auth:web');
// Route::get('/login', [UserAuthController::class, 'login'])
//     ->name('user.home');

Route::resource('user', UserAuthController::class)
    ->middleware('auth:web');

Route::get('/appointment', [AppointmentController::class, 'viewAppointment'])
    ->name('user.appointment')
    ->middleware('auth:web');
Route::post('/cancelAppointment', [AppointmentController::class, 'cancelAppointment'])
    ->name('user.cancelAppointment')
    ->middleware('auth:web');
Route::post('/updateAppointment', [AppointmentController::class, 'updateAppointment'])
    ->name('user.updateAppointment')
    ->middleware('auth:web');
Route::post('/login', [UserAuthController::class, 'handleLogin'])
    ->name('user.handleLogin');
Route::get('/logout', [UserAuthController::class, 'logout'])
    ->name('user.logout');
Route::post('/create', [UserAuthController::class, 'store'])
    ->name('user.store');
Route::get('/resetPassword', function(){
        return view('user.resetPassword');
    })->name('user.resetPassword');

//admin
Route::get('admin/', [AdminAuthController::class, 'index'])
    ->name('admin.home')
    ->middleware('auth:admin');
Route::get('admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'handleLogin'])
    ->name('admin.handleLogin');
Route::get('admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');
Route::get('admin/resetpassword', function(){
    return view('admin.resetpassword');
})->name('admin.resetpassword');   
Route::post('admin/resetpassword', [AdminAuthController::class, 'resetpassword'])
    ->name('admin.handleresetpassword');
Route::get('admin/clinicManage', [ClinicController::class, 'create'])
    ->name('admin.clinicManage');
Route::get('admin/clinics', [ClinicController::class, 'index'])
    ->name('admin.clinics');
Route::post('admin/CreateClinic', [ClinicController::class, 'store'])
    ->name('admin.storeClinic');
Route::post('admin/UpdateClinic', [ClinicController::class, 'edit'])
    ->name('admin.editClinic');
Route::get('admin/CreateStaff', [StaffController::class, 'index'])
    ->name('admin.createStaff');
Route::post('admin/CreateStaff', [StaffController::class, 'store'])
    ->name('admin.staffStore');
Route::get('admin/staffs', [StaffController::class, 'staffList'])
    ->name('admin.staffList');
Route::get('admin/healthServiceList', [HealthServiceController::class, 'index'])
    ->name('admin.healthServiceList');
Route::get('admin/healthServiceManage', [HealthServiceController::class, 'create'])
    ->name('admin.healthServiceManage');
Route::post('admin/healthServiceCreate',[HealthServiceController::class, 'store'])
    ->name('admin.healthServiceCreate');
Route::get('admin/timeSlotList', [TimeSlotController::class, 'index'])
    ->name('admin.timeSlotList');
Route::get('admin/timeSlotManage', [TimeSlotController::class, 'create'])
    ->name('admin.timeSlotManage');
Route::post('admin/timeSlotCreate',[TimeSlotController::class, 'store'])
    ->name('admin.timeSlotCreate');
Route::get('admin/appointment', [AppointmentController::class, 'index'])
    ->name('admin.appointment');
Route::post('admin/staffUpdate',[StaffController::class, 'staffUpdate'])
    ->name('admin.staffUpdate');
Route::post('admin/sendMail',[MailerController::class, 'composeEmail'])
    ->name('admin.sendMail');

//staff
Route::get('staff/', [StaffAuthController::class, 'index'])
    ->name('staff.home')
    ->middleware('auth:staff');
Route::get('staff/login', [StaffAuthController::class, 'login'])
    ->name('staff.login');
Route::post('staff/login', [StaffAuthController::class, 'handleLogin'])
    ->name('staff.handleLogin');
Route::get('staff/logout', [StaffAuthController::class, 'logout'])
    ->name('staff.logout');
Route::get('staff/resetpassword', function(){
        return view('staff.resetpassword');
    })->name('staff.resetpassword');   
Route::post('staff/resetpassword', [StaffAuthController::class, 'resetpassword'])
        ->name('staff.handleresetpassword');
Route::get('staff/schedule', [StaffController::class, 'schedule'])
    ->name('staff.schedule');
Route::post('staff/schedule', [StaffController::class, 'update'])
    ->name('staff.update');
Route::get('staff/health_history/{id}', [StaffController::class, 'health_note'])
    ->name('staff.healthNote');    
Route::get('staff/info/{id}', [StaffController::class, 'info'])
    ->name('staff.info');  

//Appointment
Route::post('appointment/', [AppointmentController::class, 'store'])
    ->name('user.appointment')
    ->middleware('auth:web');

//Mailer
Route::get('sendReminder/', [MailerController::class, 'reminder'])
    ->name('reminder');