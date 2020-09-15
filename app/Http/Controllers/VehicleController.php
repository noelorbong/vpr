<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $records = DB::table('vehicles')
        ->leftJoin('license', 'vehicles.owners_name', '=', 'license.id')
       ->select('vehicles.*'
       ,DB::raw('concat(COALESCE(license.last_name,""),", ",COALESCE(license.first_name,"")," ",COALESCE(license.middle_name,"")) as full_name')
        ,'license.contact_number')
        ->orderByRaw('vehicles.owners_name asc')
        ->get();

        return  compact('records');
    }

    public function indexNotMissing()
    {
        $records = DB::table('vehicles')
        ->leftJoin('license', 'vehicles.owners_name', '=', 'license.id')
       ->select('vehicles.*'
        ,DB::raw('concat(COALESCE(license.last_name,""),", ",COALESCE(license.first_name,"")," ",COALESCE(license.middle_name,"")) as full_name')
        ,'license.contact_number')
        ->orderByRaw('vehicles.owners_name asc')
        ->where('vehicles.status','=',1)
        ->get();

        return  compact('records');
    }
    
    public function store(Request $request)
    {
       $user = DB::table('vehicles')
        ->select(DB::raw('(count(*)) as number_count')
           )
        ->where('plate_no','=',$request->plate_no)
        ->first();

        if($user->number_count > 0){
            return 'failed';
        }
        
        DB::table('vehicles')->insert(
            [
            'cr_no' =>  $request->cr_no,
            'my_file_no' => $request->my_file_no,
            'plate_no' => $request->plate_no,
            'engine_no' => $request->engine_no,
            'chassis_no' => $request->chassis_no,
            'denomination' => $request->denomination,
            'pistion_displacement' => $request->pistion_displacement,
            'no_of_cylinders' => $request->no_of_cylinders,
            'fuel' => $request->fuel,
            'make' => $request->make,
            'series' => $request->series,
            'body_type' => $request->body_type,
            'body_no' => $request->body_no,
            'year_model' => $request->year_model,
            'gross_wt' => (float)$request->gross_wt,
            'net_wt' => (float)$request->net_wt,
            'shipping_wt' => (float)$request->shipping_wt,
            'net_capacity' => (float)$request->net_capacity,
            'owners_name' => (int)$request->owners_name,
            'or_no' => $request->or_no,
            'or_date' => $request->or_date,
            'expiration_date' => $request->expiration_date,
            'amount' => $request->amount,
            // 'complete_address' => $request->complete_address,
            // 'owners_number' =>$request->owners_number
            ]
        );
        
        return 'success';
    }

    public function edit($id)
    {
        $record = DB::table('vehicles')
       ->leftJoin('license', 'vehicles.owners_name', '=', 'license.id')
       ->select('vehicles.*'
       ,DB::raw('concat(COALESCE(license.last_name,""),", ",COALESCE(license.first_name,"")," ",COALESCE(license.middle_name,"")) as full_name')
        ,'license.contact_number')
        ->orderByRaw('vehicles.owners_name asc')
       ->where('vehicles.id','=',$id)
        ->first();

        
        return  compact('record');
    }

    public function update(Request $request)
    {

        $user = DB::table('vehicles')
        ->select(DB::raw('(count(*)) as number_count')
           )
        ->where('plate_no','=',$request->plate_no)
        ->where('id','!=',$request->id)
        ->first();

        if($user->number_count > 0){
            return 'failed';
        }

      DB::table('vehicles')
      ->where('id','=',$request->id)
      ->update(
            [
            'cr_no' =>  $request->cr_no,
            'my_file_no' => $request->my_file_no,
            'plate_no' => $request->plate_no,
            'engine_no' => $request->engine_no,
            'chassis_no' => $request->chassis_no,
            'denomination' => $request->denomination,
            'pistion_displacement' => $request->pistion_displacement,
            'no_of_cylinders' => $request->no_of_cylinders,
            'fuel' => $request->fuel,
            'make' => $request->make,
            'series' => $request->series,
            'body_type' => $request->body_type,
            'body_no' => $request->body_no,
            'year_model' => $request->year_model,
            'gross_wt' => (float)$request->gross_wt,
            'net_wt' => (float)$request->net_wt,
            'shipping_wt' => (float)$request->shipping_wt,
            'net_capacity' => (float)$request->net_capacity,
            'owners_name' => (int)$request->owners_name,
            'or_no' => $request->or_no,
            'or_date' => $request->or_date,
            'expiration_date' => $request->expiration_date,
            'amount' => $request->amount,
            // 'complete_address' => $request->complete_address,
            // 'owners_number' =>$request->owners_number
            ]
        );
        
        return 'success';
    }

    public function delete($id)
    {
        DB::table('vehicles')->where('id', '=', $id)->delete();

        return 'success';
    }
}