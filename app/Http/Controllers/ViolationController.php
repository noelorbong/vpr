<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ViolationController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $records = DB::table('violations')
       ->select('violations.*')
        ->orderByRaw('title asc')
        ->get();

        
        return  compact('records');
    }
    
    public function store(Request $request)
    {
        
        DB::table('violations')->insert(
            [
            'title' =>  $request->title,
            'fine' => (float)$request->fine,
            'description' => $request->description,
            ]
        );
        
        return 'success';
    }

    public function edit($id)
    {
        $record = DB::table('violations')
       ->select('violations.*')
       ->where('id','=',$id)
        ->first();

        
        return  compact('record');
    }

    public function update(Request $request)
    {
         DB::table('violations')
         ->where('id','=',$request->id)
         ->update(
            [
            'title' =>  $request->title,
            'fine' => (float)$request->fine,
            'description' => $request->description,
            ]
        );
        
        return 'success';
    }

    public function delete($id)
    {
        DB::table('violations')->where('id', '=', $id)->delete();

        return 'success';
    }
}