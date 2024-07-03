<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\http\Controllers\ContactController;

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('sobre-ambaca/{page}', [SiteController::class, 'page'])->name('site.pages.page');

Route::get('blog', [SiteController::class, 'page'])->name('site.pages.blog');
Route::get('noticia/{page}', [SiteController::class, 'post'])->name('site.pages.post');
Route::get('categoria/{category}', [SiteController::class, 'category'])->name('site.pages.category');

Route::get('projectos/', [SiteController::class, 'page'])->name('site.pages.projects');
Route::get('projecto/{project}', [SiteController::class, 'page'])->name('site.pages.project');


Route::get('entidades/', [SiteController::class, 'page'])->name('site.pages.entities');
Route::get('entidade/{entity}', [SiteController::class, 'page'])->name('site.pages.entity');

Route::get('servicos/', [SiteController::class, 'page'])->name('site.pages.services');
Route::get('servico/{service}', [SiteController::class, 'page'])->name('site.pages.service');

Route::get('documentos', [SiteController::class, 'page'])->name('site.pages.documents');

Route::get('busca/{s}', [SiteController::class, 'page'])->name('site.pages.search');

Route::get('banco-de-imagens', [SiteController::class, 'page'])->name('site.galleries');
Route::get('galeria/{title}', [SiteController::class, 'page'])->name('site.gallery');
Route::get('galeria-de-administradores', [SiteController::class, 'page'])->name('site.pages.managers-gallery');

Route::get('perguntas-frequentes', [SiteController::class, 'page'])->name('site.faq');
Route::get('mapa-do-site', [SiteController::class, 'page'])->name('site.map');

Route::get('/contacto', [ContactController::class, 'index'])->name('site.contact');
Route::post('/contacto', [ContactController::class, 'store'])->name('site.contact.store');
