<?php

use App\Models\Page;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $record = Page::where('slug', 'homepage')->first(); // Retrieve the Page record

    if (!$record) {
        abort(404, 'Homepage not found.');
    }

    return view('homepage', ['record' => $record]); // Pass the $record to the view
});