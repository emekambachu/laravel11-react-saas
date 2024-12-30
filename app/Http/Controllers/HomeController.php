<?php

namespace App\Http\Controllers;

use App\Http\Resources\Feature\FeatureResource;
use App\Models\Feature\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(){
        $features = Feature::where('active', true)->get();
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'features' => FeatureResource::collection($features),
        ]);
    }
}
