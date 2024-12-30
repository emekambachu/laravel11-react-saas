<?php

namespace App\Http\Controllers;

use App\Http\Resources\Feature\UsedFeatureResource;
use App\Models\Feature\UsedFeature;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $usedFeatures = UsedFeature::with('feature')
            ->where('user_id', auth()->id())
            ->latest()->paginate();

        return inertia('Dashboard', [
            'usedFeature' => UsedFeatureResource::collection($usedFeatures)->response()->getData(true),
            'success' => session('success'),
            'error' => session('error')
        ]);
    }
}
