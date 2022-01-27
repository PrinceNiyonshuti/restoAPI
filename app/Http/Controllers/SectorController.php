<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all sectors
        return Sector::with('restaurants')->get();
        // return Sector::latest()->get();
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
        //new sector
        $newSector = new Sector;
        $newSector->district_id = $request->sector["district_id"];
        $newSector->sectorName = $request->sector["sectorName"];
        $newSector->save();
        return $newSector;
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
        return Sector::find($id);
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
        //update sector
        $existingSect =  Sector::find($id);
        if($existingSect){
            $existingSect->district_id = $request->sector["district_id"];
            $existingSect->sectorName = $request->sector["sectorName"];
            $existingSect->save();
            return $existingSect;
        }

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
        //delete sector
        $existingSect =  Sector::find($id);
        if($existingSect){
            $existingSect->delete();
            return "Sector successfully deleted";
        }
    }
}
