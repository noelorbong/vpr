<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ViolatorController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $records = DB::table('violators')
        ->leftJoin('vehicles', 'violators.vehicle_id', '=', 'vehicles.id')
        ->leftJoin('license', 'violators.license_id', '=', 'license.id')
        ->leftJoin('violations', 'violators.violation', '=', 'violations.id')
        ->select('violators.*'
            ,'vehicles.plate_no'
            ,'violations.title'
            ,'violations.fine'
            ,DB::raw('(Select concat(COALESCE(last_name,""),", ",COALESCE(first_name,"")," ",COALESCE(middle_name,"")) from license where id = vehicles.owners_name limit 1) as owners_name')
            ,DB::raw('concat(COALESCE(license.last_name,""),", ",COALESCE(license.first_name,"")," ",COALESCE(license.middle_name,"")) as full_name')
        ,'license.contact_number')
        ->orderByRaw('violators.date_violated desc')
        ->get();
        
        return  compact('records');
    }

    public function indexScanned()
    {
        $records = DB::table('scanned_violators')
        ->leftJoin('vehicles', 'scanned_violators.plate_no', '=', 'vehicles.plate_no')
        ->leftJoin('license', 'scanned_violators.license_id', '=', 'license.id')
        ->leftJoin('violations', 'scanned_violators.violation', '=', 'violations.id')
        ->select('scanned_violators.*'
            ,'violations.title'
            ,'violations.fine'
            ,DB::raw('(Select concat(COALESCE(last_name,""),", ",COALESCE(first_name,"")," ",COALESCE(middle_name,"")) from license where id = vehicles.owners_name limit 1) as owners_name')
            ,DB::raw('concat(COALESCE(license.last_name,""),", ",COALESCE(license.first_name,"")," ",COALESCE(license.middle_name,"")) as full_name')
        ,'license.contact_number')
        ->orderByRaw('scanned_violators.date_violated desc')
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

        DB::table('violators')->insert(
            [
            'license_id' =>  $request->license_id,
            'vehicle_id' => $request->vehicle_id,
            'date_violated' => $request->date_violated,
            'time_violated' => $request->time_violated,
            'violation' => $request->violation,
            'note' => $request->note,
            ]
        );
        
        return 'success';
    }

    public function edit($id)
    {
        $record = DB::table('violators')
        ->leftJoin('vehicles', 'violators.vehicle_id', '=', 'vehicles.id')
        ->leftJoin('license', 'violators.license_id', '=', 'license.id')
        ->leftJoin('violations', 'violators.violation', '=', 'violations.id')
        ->select('violators.*'
            ,'vehicles.plate_no'
            ,'violations.title'
            ,'violations.fine'
            ,DB::raw('concat(COALESCE(license.last_name,""),", ",COALESCE(license.first_name,"")," ",COALESCE(license.middle_name,"")) as full_name')
        ,'license.contact_number')
        ->where('violators.id','=',$id)
        ->first();

        return  compact('record');
    }

    public function editScanned($id)
    {
        $record = DB::table('scanned_violators')
        ->leftJoin('vehicles', 'scanned_violators.plate_no', '=', 'vehicles.plate_no')
        ->leftJoin('license', 'scanned_violators.license_id', '=', 'license.id')
        ->leftJoin('violations', 'scanned_violators.violation', '=', 'violations.id')
        ->select('scanned_violators.*'
            ,'violations.title'
            ,'violations.fine'
            ,DB::raw('(Select concat(COALESCE(last_name,""),", ",COALESCE(first_name,"")," ",COALESCE(middle_name,"")) from license where id = vehicles.owners_name limit 1) as owners_name')
            ,DB::raw('concat(COALESCE(license.last_name,""),", ",COALESCE(license.first_name,"")," ",COALESCE(license.middle_name,"")) as full_name')
        ,'license.contact_number')
        ->where('scanned_violators.id','=',$id)
        ->first();

        return  compact('record');
    }

    public function update(Request $request)
    {
        
        
        DB::table('violators')
         ->where('id','=',$request->id)
        ->update(
             [
            'license_id' =>  $request->license_id,
            'vehicle_id' => $request->vehicle_id,
            'date_violated' => $request->date_violated,
            'time_violated' => $request->time_violated,
            'violation' => $request->violation,
            'note' => $request->note,
            ]
        );
        
        return 'success';
    }

      public function updateScanned(Request $request)
    {
        

         DB::table('scanned_violators')
         ->where('id','=',$request->id)
        ->update(
             [
            'license_id' =>  $request->license_id,
            'violation' => $request->violation,
            'note' => $request->note,
            ]
        );

        return 'success';
    }

    public function deleteScanned($id)
    {
        
        DB::table('scanned_violators')->where('id', '=', $id)->delete();

        return 'success';
    }

    public function delete($id)
    {
        
        DB::table('violators')->where('id', '=', $id)->delete();

        return 'success';
    }
}