<?php

namespace App\Http\Controllers;

use App\Capital;
use Illuminate\Http\Request;

class CapitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('capital', [
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
     * @param  \App\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function show(Capital $capital)
    {
        if (auth() && $capital->userID == \Auth::user()->id){
			$arr = ['userID'=>$capital->userID, 'foodLimit'=>$capital->foodLimit, 'clicks'=>$capital->clicks, 
			'food'=>$capital->food, 'wood'=>$capital->wood, 'stone'=>$capital->stone, 'stoneHoes'=>$capital->stoneHoes, 
			'stoneAxes'=>$capital->stoneAxes, 'stonePickaxes'=>$capital->stonePickaxes, 'stoneSpears'=>$capital->stoneSpears];
			print(json_encode($arr));
		}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function edit(Capital $capital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Capital $capital)
    {
		switch($request->action){
			case('work'):
				$capital->clicks++;
				break;
		}
		$capital->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Capital $capital)
    {
        //
    }
}
