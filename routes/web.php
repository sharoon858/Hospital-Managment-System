<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\DoctorProfileController;
use App\Http\Controllers\PatientProfileController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\Doctor\DoctorController;
use App\Http\Controllers\doctor\DoctorCheckupController;
use App\Http\Controllers\doctor\DoctorPatientController;
use App\Http\Controllers\admin\Patient\PatientController;
use App\Http\Controllers\doctor\DoctorDashboardController;
use App\Http\Controllers\doctor\DoctorAppointmentController;
use App\Http\Controllers\patient\PatientDashboardController;
use App\Http\Controllers\patient\PatientAppointmentController;
use App\Http\Controllers\admin\appointmnet\AppointmentController;
use App\Http\Controllers\patient\PatientCheckupController;
use App\Http\Middleware\AdminAuthenticate;
use App\Http\Middleware\DoctorAuthenticate;
use App\Http\Middleware\PatientAuthenticate;

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

Route::controller(AuthController::class)->group(function () {
    Route::middleware(RedirectIfAuthenticated::class)->group(function () {
        Route::get('/', 'login_view')->name('login');
        Route::post('/', 'login');
        Route::get('register', 'register_view')->name('register');
        Route::post('register', 'register');
    });

    Route::middleware(Authenticate::class)->group(function () {
        Route::get('logout', 'logout')->name('logout');
    });
});
////////////////////////////////////////////ADMIN SECTION////////////////////////////////////////////////////
Route::middleware(Authenticate::class)->group(function () {
    Route::middleware(AdminAuthenticate::class)->group(function () {
        Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
            Route::get('edit', 'edit')->name('edit');
            Route::patch('details', 'update_details')->name('details');
            Route::patch('picture', 'update_picture')->name('picture');
            Route::patch('password', 'update_password')->name('password');
        });

        Route::controller(DashboardController::class)->group(function () {
            Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
        });

        Route::controller(DoctorController::class)->group(function () {
            Route::get('admin/doctors', 'index')->name('admin.doctor');

            Route::prefix('admin/doctor/')->name('admin.doctor.')->group(function () {
                Route::get('create', 'create')->name('create');
                Route::patch('create', 'store');
                Route::get('{doctor}/show', 'show')->name('show');
                Route::get('{doctor}/edit', 'edit')->name('edit');
                Route::patch('{doctor}/details', 'update_details')->name('details');
                Route::patch('{doctor}/picture', 'update_picture')->name('picture');
                Route::patch('{doctor}/password', 'update_password')->name('password');
                Route::delete('{doctor}/destroy', 'destroy')->name('destroy');
            });
        });

        Route::controller(PatientController::class)->group(function () {
            Route::get('admin/patients', 'index')->name('admin.patient');

            Route::prefix('admin/patient/')->name('admin.patient.')->group(function () {
                Route::get('create', 'create')->name('create');
                Route::patch('create', 'store');
                Route::get('{patient}/show', 'show')->name('show');
                Route::get('{patient}/edit', 'edit')->name('edit');
                Route::patch('{patient}/details', 'update_details')->name('details');
                Route::patch('{patient}/picture', 'update_picture')->name('picture');
                Route::patch('{patient}/password', 'update_password')->name('password');
                Route::delete('{patient}/destroy', 'destroy')->name('destroy');
            });
        });

        Route::controller(AppointmentController::class)->group(function () {
            Route::get('admin/appointments', 'index')->name('admin.appointments');

            Route::prefix('admin/appointment/')->name('admin.appointment.')->group(function () {
                Route::get('create', 'create')->name('create');
                Route::patch('create', 'store');
                Route::get('{appointment}/show', 'show')->name('show');
                Route::get('{appointment}/edit', 'edit')->name('edit');
                Route::patch('{appointment}/edit', 'update');
                Route::delete('{appointment}/destroy', 'destroy')->name('destroy');
            });
        });
    });



                      ///////////////////////////////DOCTOR SECTION///////////////////////////////////

    Route::middleware(DoctorAuthenticate::class)->group(function () {

        Route::controller(DoctorProfileController::class)->prefix('profile/doctor')->name('profile.doctor.')->group(function () {
            Route::get('/edit', 'edit')->name('edit');
            Route::patch('/details', 'update_details')->name('details');
            Route::patch('/picture', 'update_picture')->name('picture');
            Route::patch('/password', 'update_password')->name('password');
        });

        Route::controller(DoctorDashboardController::class)->group(function () {
            Route::get('/doctor/dashboard', 'index')->name('doctor.dashboard');
        });
        Route::controller(DoctorPatientController::class)->group(function () {
            Route::get('doctor/patients', 'index')->name('doctor.patient');
            Route::get('doctor/patient/{patient}/show', 'show')->name('doctor.patient.show');
        });


        Route::controller(DoctorAppointmentController::class)->group(function () {
            Route::get('doctor/appointments', 'index')->name('doctor.appointments');
            Route::prefix('doctor/appointment/')->name('doctor.appointment.')->group(function () {
                Route::get('{appointment}/show', 'show')->name('show');
                Route::get('{appointment}/update/{status}', 'updateStatus')->name('updateStatus');
            });
        });
        Route::controller(DoctorCheckupController::class)->group(function () {
            Route::get('doctor/checkup/{appointment}/create', 'create')->name('doctor.checkup.create');
            Route::patch('doctor/checkup/{appointment}/create', 'store');
        });
    });

                        ///////////////////////////////PATIENT SECTION///////////////////////////////////


    Route::middleware(PatientAuthenticate::class)->group(function () {

        Route::controller(PatientProfileController::class)->prefix('profile/patient')->name('profile.patient.')->group(function () {
            Route::get('/edit', 'edit')->name('edit');
            Route::patch('/details', 'update_details')->name('details');
            Route::patch('/picture', 'update_picture')->name('picture');
            Route::patch('/password', 'update_password')->name('password');
        });

        Route::controller(PatientDashboardController::class)->group(function () {
            Route::get('/patient/dashboard', 'index')->name('patient.dashboard');
        });

        Route::controller(PatientAppointmentController::class)->group(function () {
            Route::get('patient/appointments', 'index')->name('patient.appointments');
            Route::prefix('patient/appointment/')->name('patient.appointment.')->group(function () {
                Route::get('create', 'create')->name('create');
                Route::patch('create', 'store');
                Route::get('{appointment}/show', 'show')->name('show');
                Route::get('{appointment}/edit', 'edit')->name('edit');
                Route::patch('{appointment}/edit', 'update');
                Route::delete('{appointment}/destroy', 'destroy')->name('destroy');
            });
        });

        Route::controller(PatientCheckupController::class)->group(function () {
            Route::get('patient/checkups', 'index')->name('patient.checkups');
        });
    });
});
