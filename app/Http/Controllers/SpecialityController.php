<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use App\Http\Requests\StoreSpecialityRequest;
use App\Http\Requests\UpdateSpecialityRequest;
use Illuminate\Support\Facades\DB;
use Str;

class SpecialityController extends Controller
{
    public function getAllSpecialists()
    {
        $data = Speciality::get();
        return response()->json($data);
    }

}
