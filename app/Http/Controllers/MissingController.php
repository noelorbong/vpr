<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MissingController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $records = DB::table('missing_vehicles as mv')
        ->leftJoin('vehicles', 'mv.vehicle_id', '=', 'vehicles.id')
        ->leftJoin('license', 'vehicles.owners_name', '=', 'license.id')
        ->select(DB::raw('mv.id as missing_vehicles_id')
            ,'mv.date_missing'
            ,'mv.missing_note'
            ,'mv.date_found'
            ,'mv.found_note'
            ,DB::raw('concat(COALESCE(license.last_name,""),", ",COALESCE(license.first_name,"")," ",COALESCE(license.middle_name,"")) as full_name')
        ,'license.contact_number'
            ,'vehicles.*')
        ->orderByRaw('mv.date_missing desc')
        ->where('mv.status','=',0)
        ->get();
        
        return  compact('records');
    }

    public function index2()
    {
        $records = DB::table('missing_vehicles as mv')
        ->leftJoin('vehicles', 'mv.vehicle_id', '=', 'vehicles.id')
        ->leftJoin('license', 'vehicles.owners_name', '=', 'license.id')
        ->select(DB::raw('mv.id as missing_vehicles_id')
            ,'mv.date_missing'
            ,'mv.missing_note'
            ,'mv.date_found'
            ,'mv.found_note'
            ,DB::raw('concat(COALESCE(license.last_name,""),", ",COALESCE(license.first_name,"")," ",COALESCE(license.middle_name,"")) as full_name')
        ,'license.contact_number'
            ,'vehicles.*')
        ->orderByRaw('mv.date_found desc')
        ->where('mv.status','=',1)
        ->get();
        
        return  compact('records');
    }
    
    public function store(Request $request)
    {
        DB::table('vehicles')
         ->where('id','=',$request->vehicle_id)
         ->update(
            [
            'status' =>  0,
            ]
        );
        

        DB::table('missing_vehicles')->insert(
            [
            'vehicle_id' =>  $request->vehicle_id,
            'date_missing' => $request->date_missing,
            'missing_note' => $request->missing_note,
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

    public function updateFound(Request $request)
    {
        DB::table('vehicles')
         ->where('id','=',$request->vehicle_id)
         ->update(
            [
            'status' =>  1,
            ]
        );
        
        DB::table('missing_vehicles')
         ->where('id','=',$request->id)
        ->update(
            [
            'date_found' => $request->date_found,
            'found_note' => $request->found_note,
            'status' => 1
            ]
        );
        
        return 'success';
    }

    public function delete($id,$vehicle_id)
    {
        DB::table('vehicles')
         ->where('id','=',$vehicle_id)
         ->update(
            [
            'status' =>  1,
            ]
        );

        DB::table('missing_vehicles')->where('id', '=', $id)->delete();

        return 'success';
    }
}