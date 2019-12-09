<?php

namespace App\Http\Controllers;

use App\Labor;
use Illuminate\Http\Request;

class LaborController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('labor', [
	   		'capital'=>\App\Capital::where('userID', \Auth::id())->first(), 
	   		'labor'=>\App\Labor::where('userID', \Auth::id())->first() 
		]);
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
     * @param  \App\Labor  $labor
     * @return \Illuminate\Http\Response
     */
    public function show(Labor $labor)
    {   
		if (auth() && $labor->userID == \Auth::user()->id){
			$arr = ['userID'=>$labor->userID, 'workers'=>$labor->workers, 'farmers'=>$labor->farmers, 
			'lumberjacks'=>$labor->lumberjacks, 'stonecutters'=>$labor->stonecutters, 
			'farmerOverseers'=>$labor->farmerOverseers, 'stonecutterOverseers'=>$labor->stonecutterOverseers, 
			'lumberjackOverseers'=>$labor->lumberjackOverseers, 'toolmakers'=>$labor->toolmakers, 
			'weaponsmakers'=>$labor->weaponsmakers, 'warriors'=>$labor->warriors, 'newPopCent'=>$labor->newPopCent, 
			'campfireFloorChance'=>$labor->campfireFloorChance, 'clickCounter'=>$labor->clickCounter];
			print(json_encode($arr));
			
		}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Labor  $labor
     * @return \Illuminate\Http\Response
     */
    public function edit(Labor $labor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Labor  $labor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Labor $labor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Labor  $labor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Labor $labor)
    {
        //
    }
}
