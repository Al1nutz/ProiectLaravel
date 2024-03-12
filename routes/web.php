<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\PartenerController;
use App\Http\Controllers\LocatiiController;
use App\Http\Controllers\OrganizatoriController;
use App\Http\Controllers\TicketController;


Route::get('/', [EventController::class, 'index']);
Route::resource('events', EventController::class);
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events', [EventController::class, 'index'])->name('Event.index');
Route::get('/events/create', [EventController::class, 'create'])->name('Event.create');
Route::get('/events/{id_eve}/edit', [EventController::class, 'edit'])->name('Event.edit');
Route::get('/events/{id_eve}', [EventController::class, 'show'])->name('Event.show');
Route::put('/events/{id_eve}', 'EventController@update')->name('events.update');
Route::delete('/events/{id_eve}', [EventController::class, 'destroy'])->name('Event.destroy');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/speakers', [SpeakerController::class, 'index'])->name('speakers.index');
Route::resource('speaker', SpeakerController::class);
Route::get('/parteners', [PartenerController::class, 'index'])->name('parteners.index');
Route::resource('partener', PartenerController::class);
Route::resource('speakers', SpeakerController::class);
Route::get('/locatii', [LocatiiController::class, 'index'])->name('locatii.index');
Route::get('/locatii/create', [LocatiiController::class, 'create'])->name('locatii.create');
Route::post('/locatii', [LocatiiController::class, 'store'])->name('locatii.store');
Route::get('/locatii/{id}', [LocatiiController::class, 'show'])->name('locatii.show');
Route::get('/locatii/{id}/edit', [LocatiiController::class, 'edit'])->name('locatii.edit');
Route::put('/locatii/{id}', [LocatiiController::class, 'update'])->name('locatii.update');
Route::delete('/locatii/{id}', [LocatiiController::class, 'destroy'])->name('locatii.destroy');
Route::put('/speakers/{id_spk}', [SpeakerController::class, 'update'])->name('speakers.update');
Route::put('/parteners/{id_pti}', [PartenerController::class, 'update'])->name('partener.update');
Route::get('/organizatori', [OrganizatoriController::class, 'index'])->name('organizatori.index');
Route::get('/organizatori/create', [OrganizatoriController::class, 'create'])->name('organizatori.create');
Route::post('/organizatori', [OrganizatoriController::class, 'store'])->name('organizatori.store');
Route::get('/organizatori/{id_ogi}', [OrganizatoriController::class, 'show'])->name('organizatori.show');
Route::get('/organizatori/{id_ogi}/edit', [OrganizatoriController::class, 'edit'])->name('organizatori.edit');
Route::put('/organizatori/{id_ogi}', [OrganizatoriController::class, 'update'])->name('organizatori.update');
Route::delete('/organizatori/{id_ogi}', [OrganizatoriController::class, 'destroy'])->name('organizatori.destroy');
Route::middleware(['auth'])->group(function () {
    Route::resource('tickets', TicketController::class);
    Route::post('/create-checkout-session', [TicketController::class, 'createCheckoutSession']);
    Route::get('/success', [TicketController::class, 'paymentSuccess']);
    Route::get('/cancel', [TicketController::class, 'paymentCancel']);
    Route::post('/tickets/store', [TicketController::class, 'store'])->name('tickets.store');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
