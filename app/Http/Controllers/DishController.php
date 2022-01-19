<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all dishes
        return Dish::latest()->get();
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
        //new dish
        $newDish = new Dish;
        $newDish->restaurant_id = $request['restaurant_id'];
        $newDish->dishName = $request['dishName'];
        $newDish->dishPrice = $request['dishPrice'];
        $newDish->serveTime = $request['serveTime'];
        $newDish->ingredients = $request['ingredients'];
        if (isset($request['dishImg'])){
            $newDish->dishImg = $request->file('dishImg')->store('dish');
        }else{
            $newDish->dishImg = $request['null'];
        }
        $newDish->save();
        return $newDish;
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
        return Dish::find($id);
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
        //update dish
        $updatedDish = Dish::find($id);
        if($updatedDish){
            $updatedDish->restaurant_id = $request['restaurant_id'];
            $updatedDish->dishName = $request['dishName'];
            $updatedDish->dishPrice = $request['dishPrice'];
            $updatedDish->serveTime = $request['serveTime'];
            $updatedDish->ingredients = $request['ingredients'];
            if (isset($request['dishImg'])){
                $updatedDish->dishImg = $request->file('dishImg')->store('dish');
            }else{
                $updatedDish->dishImg = $request['null'];
            }
            $updatedDish->save();
            return $updatedDish;
        }

        return "No dish found";
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete dish

        $actualDish = Dish::find($id);
        if($actualDish){
            $actualDish->delete();
            return "Dish deleted successfully";
        }
    }
}
