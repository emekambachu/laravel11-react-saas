<?php

namespace App\Http\Controllers\Feature;

use App\Http\Controllers\Controller;
use App\Http\Resources\Feature\FeatureResource;
use App\Models\Feature\Feature;
use App\Models\Feature\UsedFeature;
use Illuminate\Http\Request;


class Feature2Controller extends Controller
{
    public ?Feature $feature = null;
    public function __construct(){
        $this->feature = Feature::where('route_name', 'feature2.index')
            ->where('active', true)->firstOrFail();
    }

    public function index(){
        return inertia('Feature/Feature2/Index', [
            'feature' => new FeatureResource($this->feature),
            'answer' => session('answer')
        ]);
    }

    public function calculate(Request $request){
        $user = $request->user();
        if($user->available_credits < $this->feature->required_credits){
            return redirect()->back();
        }

        $data = $request->validate([
            'number1' => 'required|numeric',
            'number2' => 'required|numeric',
        ]);

        $number1 = (float) $data['number1'];
        $number2 = (float) $data['number2'];

        $user->decreaseCredits($this->feature->required_credits);

        UsedFeature::create([
            'feature_id' => $this->feature->id,
            'user_id' => $user->id,
            'credits' => $this->feature->required_credits,
            'data' => $data
        ]);

        return to_route('feature2.index')->with('answer', $number1 * $number2);

    }

}
