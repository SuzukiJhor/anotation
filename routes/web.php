<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    echo "Hello word";
});

Route::get('/main', [MainController::class, 'index']);