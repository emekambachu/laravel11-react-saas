<?php

namespace App\Http\Controllers;

use App\Http\Resources\Feature\FeatureResource;
use App\Http\Resources\PackageResource;
use App\Models\Feature\Feature;
use App\Models\Package;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function index(){
        $packages = Package::all();
        $features = Feature::where('active', true)->get();

        return inertia('Credit/Index', [
            'packages' => PackageResource::collection($packages),
            'features' => FeatureResource::collection($features),
        ]);
    }

    public function buyCredits(){

    }

    public function success(){

    }

    public function cancel(){

    }

    public function webhook(){

    }
}
