<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return all districts
        return District::with('sectors', 'sectors.restaurants', 'sectors.restaurants.dishes')->get();
        // return District::latest()->get();
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
        //new district
        $newDistrict = new District;
        $newDistrict->districtName = $request->district["districtName"];
        $newDistrict->save();
        return $newDistrict;
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
        return District::find($id);
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
        //update district
        $existingDistrict =  District::find($id);
        if($existingDistrict){
            $existingDistrict->districtName = $request->district["districtName"];
            $existingDistrict->save();
            return $existingDistrict;
        }

        return "No District Found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete district
        $existingDistrict =  District::find($id);
        if($existingDistrict){
            $existingDistrict->delete();
            return "District deleted successfully";
        }

        return "No District Found";
    }
}
