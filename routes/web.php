<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LimsPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;

// ─── Páginas institucionais ────────────────────────────────────────────────
Route::get('/', HomeController::class)->name('home');
Route::get('/sobre', [LimsPageController::class, 'about'])->name('about');
Route::get('/projetos', [LimsPageController::class, 'projects'])->name('projects');
Route::get('/equipe', [LimsPageController::class, 'team'])->name('team');
Route::get('/tecnologias', [LimsPageController::class, 'technologies'])->name('technologies');
Route::get('/eventos', [LimsPageController::class, 'events'])->name('events');
Route::get('/contato', [ContactController::class, 'show'])->name('contact.show');

// ─── Blog ──────────────────────────────────────────────────────────────────
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// ─── Publicações ───────────────────────────────────────────────────────────
Route::get('/publicacoes', [PublicationController::class, 'index'])->name('publications.index');

// ─── Recursos (requer autenticação) ────────────────────────────────────────
Route::get('/recursos', [ResourceController::class, 'index'])->name('resources.index')->middleware('auth');

// ─── Eventos (detalhe + inscrição pública) ─────────────────────────────────
Route::get('/eventos/certificados/validar', [CertificateController::class, 'validateForm'])->name('certificate.validate');
Route::post('/eventos/certificados/validar', [CertificateController::class, 'validateCode'])->name('certificate.validate.check');
Route::get('/eventos/{slug}', [EventController::class, 'show'])->name('events.show');
Route::get('/eventos/{slug}/inscricao', [RegistrationController::class, 'create'])->name('events.register.create');
Route::post('/eventos/{slug}/inscricao', [RegistrationController::class, 'store'])->name('events.register.store');

// ─── Certificados ──────────────────────────────────────────────────────────
Route::get('/certificado/{token}', [CertificateController::class, 'show'])->name('certificate.show');
Route::get('/certificado/{token}/download', [CertificateController::class, 'download'])->name('certificate.download');

// ─── Painel admin ──────────────────────────────────────────────────────────
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/', Admin\DashboardController::class)->name('dashboard');

    Route::resource('posts', Admin\PostController::class);
    Route::resource('publications', Admin\PublicationController::class);
    Route::resource('resources', Admin\ResourceController::class);
    Route::resource('events', Admin\EventController::class);
    Route::resource('team-members', Admin\TeamMemberController::class)->except('show');
    Route::resource('technologies', Admin\TechnologyController::class)->except('show');

    Route::get('events/{event}/registrations', [Admin\RegistrationController::class, 'index'])
        ->name('events.registrations');
    Route::post('events/{event}/registrations/{registration}/confirm', [Admin\RegistrationController::class, 'confirm'])
        ->name('events.registrations.confirm');
    Route::post('events/{event}/certificates/generate', [Admin\CertificateController::class, 'generate'])
        ->name('events.certificates.generate');
});

// ─── Dashboard (alias para admin) ──────────────────────────────────────────
Route::get('/dashboard', fn () => redirect()->route('admin.dashboard'))
    ->middleware('auth')
    ->name('dashboard');

// ─── Perfil Breeze ─────────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ─── 404 fallback ──────────────────────────────────────────────────────────
Route::fallback(FallbackController::class);

require __DIR__.'/auth.php';
