<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RanksAndRequirementsContoller;
use App\Http\Controllers\AddAttainmentListController;
use App\Http\Controllers\PDFController;
// use App\Http\Controllers\PerformanceController;
// use App\Http\Controllers\HonorsAwardsController;


Route::get('/generate-ranking-summary-pdf', [PDFController::class, 'generateRankingSummaryPDF'])->name('generate.ranking.summary.pdf');


Route::get('/', function () {
    return view('home');
});

Route::get('/ranking-summary', function () {
    return view('ranking-summary');
});

// Route::post('/calculate-total', [ProductiveScholarshipController::class, 'calculateTotal'])->name('calculate.total');

Route::get('/', [RanksAndRequirementsContoller::class, 'showRanks']);
Route::post('/update-rank', [RanksAndRequirementsContoller::class, 'updateRank'])->name('update.rank');
Route::post('/update-next-rank', [RanksAndRequirementsContoller::class, 'updateNextRank'])->name('update.next-rank');

Route::post('/list', [AddAttainmentListController::class, 'store'])->name('list.store');
Route::put('/list/{index}', [AddAttainmentListController::class, 'update'])->name('list.update');
Route::delete('/list/{index}', [AddAttainmentListController::class, 'destroy'])->name('list.destroy');

// Route::resource('performance', PerformanceController::class);
