<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_entry = $request -> search_entry;
        if ($search_entry != NULL OR $search_entry != '')
        {
            $search_values = preg_split('/\s+/', $search_entry, -1, PREG_SPLIT_NO_EMPTY);
            $applications = Application::where(function($query) use($search_values) {
                foreach ($search_values as $value) {
                    $query -> orWhere('first_name', 'like', "%{$value}%")
                        ->orWhere('first_surname', 'like', "%{$value}%")
                    ->orWhere('email', 'like', "%{$value}%")
                    ->orWhere('document', 'like', "%{$value}%");
                }
            })-> paginate(8)->unique('document') ;
            $search_placeholder = 'Results for '.$search_entry;
            return view('applications.index') -> with('applications', $applications) -> with('search_placeholder', $search_placeholder);
        } else
        {
            $applications = Application::paginate(8)->unique('document');
            return view('table') -> with('applications', $applications);
        }
    }

    public function dashboard(Request $request)
    {
        $nApps=Application::all()->count();
        $nWork=Application::groupBy('workshop_name')->pluck('workshop_name')->count();
        $nStatus=Application::where('status','pending')->count();
        return view('home')->with('nApps',$nApps)->with('nWork',$nWork)->with('nStatus',$nStatus);
    }

    public function chart()
    {
        $labels=Application::groupBy('workshop_name')->pluck('workshop_name');
        $applications=Application::all();
        $cworkshops=collect([]);
        $colors=collect([]);
        $aworkshops=collect([]);
        function rand_color() {
            return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        }

        foreach($labels as $label){
            $datacount=Application::where('workshop_name',$label)->get()->count();
            $cworkshops->push($datacount);
            $datacount=Application::where('workshop_name',$label)->whereYear('created_at', '=', date('Y'))->count();
            $aworkshops->push($datacount);
            $colors->push(rand_color());
            //$dates->push(Application::where('workshop_name',$label)->get());
        }
        return view('mcharts')->with('cworkshops',json_encode($cworkshops))->with('labels',json_encode($labels))->with('colors',json_encode($colors))->with('aworkshops',json_encode($aworkshops));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
