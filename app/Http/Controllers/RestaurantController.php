<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all restaurant
        return Restaurant::latest()->get();
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
        //new restaurant
        $newResto = new Restaurant;
        $newResto->sector_id = $request['sector_id'];
        $newResto->restoName = $request['restoName'];
        $newResto->rating = $request['rating'];
        $newResto->location = $request['location'];
        if (isset($request['thumbnail'])){
            $newResto->thumbnail = $request->file('thumbnail')->store('restaurant');
        }else{
            $newResto->thumbnail = $request['null'];
        }
        $newResto->save();
        return $newResto;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get single restaurant
        return Restaurant::find($id);
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
        $existingResto =  Restaurant::find($id);
        if($existingResto){
            $existingResto->sector_id = $request['sector_id'];
            $existingResto->restoName = $request['restoName'];
            $existingResto->rating = $request['rating'];
            $existingResto->location = $request['location'];
            if (isset($request['thumbnail'])){
                $existingResto->thumbnail = $request->file('thumbnail')->store('restaurant');
            }else{
                $existingResto->thumbnail = $request['null'];
            }
            $existingResto->save();
            return $existingResto;
        }
        return $existingResto;
        return "No Sector Found";
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
        $existingResto = Restaurant::find($id);
        if($existingResto){
            $existingResto->delete();
            return "Restaurant successfully deleted";
        }
    }
}
