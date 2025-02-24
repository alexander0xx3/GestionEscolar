<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\PDF_Controller;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\SubjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 📌 Redirección a login si acceden a la raíz
Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

// 📌 Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// 📌 Rutas protegidas para usuarios autenticados
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home'); // Redirige a home.blade.php
    })->name('home');

    // 📌 Panel de administración
    Route::get('/panel/create/{tipo}', [PanelController::class, 'create'])->name('panel.create'); // ✅ Ruta agregada
    Route::get('/panel/{tipo}', [PanelController::class, 'index'])->name('panel.index');
    Route::get('/panel/{tipo}/{id}', [PanelController::class, 'show'])->name('panel.show');
    Route::get('/edit/{tipo}/{id?}', [PanelController::class, 'edit'])->name('panel.edit');

    // 📌 Recursos
    Route::resource('students', StudentController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('professors', ProfessorController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('commissions', CommissionController::class);
});

// 📌 Funcionalidades Extra
Route::get('/calculate', [CalculationController::class, 'showForm'])->name('calculate.form');
Route::post('/calculate', [CalculationController::class, 'calculate'])->name('calculate.result');
Route::get('/exportar/{tipo}', [PDF_Controller::class, 'exportToPdf'])->name('export.pdf');
Route::get('/filtrar/{entidad}', [App\Http\Controllers\consultasController::class, 'FiltrarEntidad'])->name('entity.filter');

// 📌 Páginas adicionales
Route::view('/blog', 'nueva_vista.blog');
Route::view('/contacto', 'nueva_vista.contacto');
