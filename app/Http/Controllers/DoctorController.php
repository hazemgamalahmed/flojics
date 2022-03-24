<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use Str;

class DoctorController extends Controller
{
   public function getAllDoctors()
   {
       $doctors = DB::table('doctors as d')
       ->select('d.id', 'd.name', 'd.phone', 'd.email', 's.name as speciality')
       ->join('specialities as s', 's.id', 'd.special_id')
       ->get();


       return response()->json($doctors);
   }

   public function getDoctorsWithSpecials($special_id)
   {
       $doctors = DB::table('doctors as d')
       ->select('d.id', 'd.name', 'd.phone', 'd.email', 's.name as speciality')
       ->join('specialities as s', 's.id', 'd.special_id')
       ->where('d.special_id', $special_id)
       ->get();

       return response()->json($doctors);
   }

}
