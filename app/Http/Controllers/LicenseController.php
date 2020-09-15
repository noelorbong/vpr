<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LicenseController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $records = DB::table('license')
       ->select('license.*'
       ,DB::raw('concat(COALESCE(last_name,""),", ",COALESCE(first_name,"")," ",COALESCE(middle_name,"")) as full_name')
       )
        ->orderByRaw('last_name asc')
        ->get();

        
        return  compact('records');
    }

    public function violations($id)
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
        ->where('violators.license_id','=',$id)
        ->orderByRaw('violators.date_violated desc')
        ->get();

        $records2 = DB::table('scanned_violators')
        ->leftJoin('vehicles', 'scanned_violators.plate_no', '=', 'vehicles.plate_no')
        ->leftJoin('license', 'scanned_violators.license_id', '=', 'license.id')
        ->leftJoin('violations', 'scanned_violators.violation', '=', 'violations.id')
        ->select('scanned_violators.*'
            ,'violations.title'
            ,'violations.fine'
            ,DB::raw('(Select concat(COALESCE(last_name,""),", ",COALESCE(first_name,"")," ",COALESCE(middle_name,"")) from license where id = vehicles.owners_name limit 1) as owners_name')
            ,DB::raw('concat(COALESCE(license.last_name,""),", ",COALESCE(license.first_name,"")," ",COALESCE(license.middle_name,"")) as full_name')
        ,'license.contact_number')
        ->where('scanned_violators.license_id','=',$id)
        ->orderByRaw('scanned_violators.date_violated desc')
        ->get();

        return  compact('records','records2');
    }

    
    
    public function store(Request $request)
    {
       $user = DB::table('license')
        ->select(DB::raw('(count(*)) as number_count')
           )
        ->where('license_no','=',$request->license_no)
        ->first();

        if($user->number_count > 0){
            return 'failed';
        }
        
        DB::table('license')->insert(
            [
            'last_name' =>  $request->last_name,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'license_no' => $request->license_no,
            'nationality' => $request->nationality,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'weight' => $request->weight,
            'height' => $request->height,
            'blood_type' => $request->blood_type,
            'eye_color' => $request->eye_color,
            'restrictions' => $request->restrictions,
            'conditions' => $request->conditions,
            'registration_date' => $request->registration_date,
            'expiration_date' => $request->expiration_date,
            'contact_number' => $request->contact_number,
            'email_address' => $request->email_address,
            'complete_address' => $request->complete_address
            ]
        );
        
        return 'success';
    }

    public function edit($id)
    {
        $record = DB::table('license')
       ->select('license.*'
        ,DB::raw('concat(COALESCE(last_name,""),", ",COALESCE(first_name,"")," ",COALESCE(middle_name,"")) as full_name')
       )
       ->where('id','=',$id)
        ->first();

        
        return  compact('record');
    }

    public function update(Request $request)
    {
        $user = DB::table('license')
        ->select(DB::raw('(count(*)) as number_count')
           )
        ->where('license_no','=',$request->license_no)
        ->where('id','!=',$request->id)
        ->first();

        if($user->number_count > 0){
            return 'failed';
        }

      DB::table('license')
      ->where('id','=',$request->id)
      ->update(
            [
            'last_name' =>  $request->last_name,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'license_no' => $request->license_no,
            'nationality' => $request->nationality,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'weight' => $request->weight,
            'height' => $request->height,
            'blood_type' => $request->blood_type,
            'eye_color' => $request->eye_color,
            'restrictions' => $request->restrictions,
            'conditions' => $request->conditions,
            'registration_date' => $request->registration_date,
            'expiration_date' => $request->expiration_date,
            'contact_number' => $request->contact_number,
            'email_address' => $request->email_address,
            'complete_address' => $request->complete_address
            ]
        );
        
        return 'success';
    }

    public function delete($id)
    {
        DB::table('license')->where('id', '=', $id)->delete();

        return 'success';
    }
}