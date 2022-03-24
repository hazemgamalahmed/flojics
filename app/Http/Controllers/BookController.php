<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Str;
class BookController extends Controller
{
    public function BookForDoctors($doctor_id, Request $request)
    {
        $data = $request->validate([
            'book_date' => 'required|date:Y-m-d H:i:s',
            'resone' => 'required|string'
        ]);

        $doctor = Doctor::where('id', $doctor_id)->first();
        if(is_null($doctor)){
            return response()->json([
                'error' => 'this doctor is not exists'
            ], 404);
        }
        $book = new Book();
        $book->user_id = \Auth::user()->id;
        $book->doctor_id = $doctor->id;
        $book->book_date = $request->book_date;
        $book->resone = $request->resone;
        $book->save();
        return response()->json([
            'message' => 'the book executed success'
        ]);
    }

    public function getMyBook()
    {
        $books = DB::table('books as b')
        ->select('u.name', 'u.phone', 'd.name as doctor_name', 'd.phone as doctor_phone', 'b.resone', 'b.book_date')
        ->join('users as u', 'u.id', 'b.user_id')
        ->join('doctors as d', 'd.id', 'b.doctor_id')
        ->where('b.user_id', \Auth::user()->id)
        ->get();

        return response()->json($books);
    }
}
