<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/admin');
        return view('home');
    }

    public function admin()
    {
        return view('layouts.admin');
    }

    public function dashData(){

        $last_plate = DB::table('scanned_plate_no')
        ->leftJoin('vehicles', 'scanned_plate_no.plate_no', '=', 'vehicles.plate_no')
        ->leftJoin('license', 'scanned_plate_no.license_id', '=', 'license.id')
        ->leftJoin('violations', 'scanned_plate_no.violation', '=', 'violations.id')
        ->select('scanned_plate_no.*'
            ,'violations.title'
            ,'violations.fine'
            ,DB::raw('(Select concat(COALESCE(last_name,""),", ",COALESCE(first_name,"")," ",COALESCE(middle_name,"")) from license where id = vehicles.owners_name limit 1) as owners_name')
            ,DB::raw('concat(COALESCE(license.last_name,""),", ",COALESCE(license.first_name,"")," ",COALESCE(license.middle_name,"")) as full_name')
        ,'license.contact_number')
        ->orderByRaw('scanned_plate_no.date_violated desc')
        ->first();

        $violator_manual = DB::table('violators')
        ->where('date_violated', '=', DB::raw('Date(NOW())'))
        ->count();

        $violator_scanned = DB::table('scanned_violators')
        ->where('date_violated', '=', DB::raw('Date(NOW())'))
        ->count();

        return  compact('last_plate','violator_manual','violator_scanned');
    }
}
