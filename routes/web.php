<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BalController;
use App\Http\Controllers\EcoController;
use App\Http\Controllers\TurController;
use App\Http\Controllers\SitioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\ServicioController;

/*
|--------------------------------------------------------------------------
| PÁGINA PRINCIPAL
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('index');
})->name('inicio');

/*
|--------------------------------------------------------------------------
| BALNEARIOS
|--------------------------------------------------------------------------
*/
Route::get('/balnearios', [BalController::class, 'index'])->name('balnearios.index');
Route::get('/balnearios/{id}', [BalController::class, 'show'])->name('balnearios.show');

/*
|--------------------------------------------------------------------------
| ECOTURÍSTICOS
|--------------------------------------------------------------------------
*/
Route::get('/ecoturisticos', [EcoController::class, 'index'])->name('ecoturisticos.index');
Route::get('/ecoturisticos/{id}', [EcoController::class, 'show'])->name('ecoturisticos.show');

/*
|--------------------------------------------------------------------------
| TURÍSTICOS
|--------------------------------------------------------------------------
*/
Route::get('/turisticos', [TurController::class, 'index'])->name('turisticos.index');
Route::get('/turisticos/{id}', [TurController::class, 'show'])->name('turisticos.show');

/*
|--------------------------------------------------------------------------
| SITIOS
|--------------------------------------------------------------------------
*/
Route::post('/sitios', [SitioController::class, 'store'])->name('sitios.store');
Route::get('/sitios/{id}/editar', [SitioController::class, 'edit'])->name('sitios.edit');
Route::put('/sitios/{id}', [SitioController::class, 'update'])->name('sitios.update');

/*
|--------------------------------------------------------------------------
| SERVICIOS (VISTAS ESTÁTICAS)
|--------------------------------------------------------------------------
*/
Route::prefix('servicios')->group(function () {
    Route::view('/', 'servicios.index')->name('servicios.index');
    Route::view('/hoteles', 'servicios.hoteles')->name('servicios.hoteles');
    Route::view('/restaurantes', 'servicios.restaurantes')->name('servicios.restaurantes');
    Route::view('/crear', 'servicios.create')->name('servicios.create');
    Route::view('/editar', 'servicios.edit')->name('servicios.edit');
    Route::view('/detalle', 'servicios.show')->name('servicios.show');
});

/*
|--------------------------------------------------------------------------
| CONTACTO
|--------------------------------------------------------------------------
*/
Route::view('/contacto', 'contacto')->name('contacto');

/*
|--------------------------------------------------------------------------
| LOGIN & REGISTRO
|--------------------------------------------------------------------------
*/

// Mostrar formulario login
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');

// Procesar login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Recuperar contraseña
Route::get('/recuperar-password', [AuthController::class, 'recuperarForm'])->name('password.request');
Route::post('/recuperar-password', [AuthController::class, 'recuperar'])->name('password.update');

// Registro general
Route::get('/registro', [AuthController::class, 'registroForm'])->name('registro');

// Registro por rol
// Turista
Route::get('/registro/turista', [AuthController::class, 'registroTuristaForm'])->name('registro.turista.form');
Route::post('/registro/turista', [AuthController::class, 'registroTurista'])->name('registro.turista.post');

// Hotelero
Route::get('/registro/hotelero', [AuthController::class, 'registroHoteleroForm'])->name('registro.hotelero.form');
Route::post('/registro/hotelero', [AuthController::class, 'registroHotelero'])->name('registro.hotelero.post');

// Restaurantero
Route::get('/registro/restaurantero', [AuthController::class, 'registroRestauranteroForm'])->name('registro.restaurantero.form');
Route::post('/registro/restaurantero', [AuthController::class, 'registroRestaurantero'])->name('registro.restaurantero.post');

/*
|--------------------------------------------------------------------------
| ADMIN PANEL (USANDO SESIÓN MANUAL + CHECKROLE)
|--------------------------------------------------------------------------
*/
Route::middleware(['checkrole:admin'])->prefix('admin')->group(function () {

    // Dashboard principal
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Bandeja de solicitudes
    Route::get('/solicitudes', [AdminController::class, 'solicitudes'])->name('admin.solicitudes');

    // Aprobar usuario
    Route::post('/aprobar/{id}', [AdminController::class, 'aprobar'])->name('admin.aprobar');

    // CRUD Destinos
    Route::resource('/destinos', DestinoController::class);

    // CRUD Servicios
    Route::resource('/servicios', ServicioController::class);
});
