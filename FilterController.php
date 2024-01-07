<?php

namespace App\Http\Controllers\Front\Predictions\Today;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Models\Back\Prediction;
use App\Models\Back\PredictionByDate;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

//        dd($data);

        $predictions = PredictionByDate::all();

        $query = PredictionByDate::query();

        if(isset($data['date']))
        {
            $query->where('date', $data['date']);
        }

        if(isset($data['status']))
        {
            $query->where('status', $data['status']);
        }


        $predictions = $query->get();

        dd($predictions);

    }
}
