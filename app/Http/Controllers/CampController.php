<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Camp;
use App\CampCategory;

include('includes/functions.php');

class CampController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camps = Camp::with('categories')->get();

        return response()->json(['camps'=>$camps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
             'title' =>'required',
             'category_id' =>'required',  
             'max_age' =>'required',
             'min_age' => 'required',             
             'end_date' => 'required',
             'section' => 'required',
             'start_date' =>'required',
             'end_date' => 'required'

         ]);
        
        $camp = Camp::create(request(['title', 'category_id', 'section', 'max_age', 'min_age', 'start_date', 'end_date','short_blurb','listing_blurb', 'long_blurb', 'registration_url', 'forms_url', 'camp_site_map_url']));

        saveImage($request->main_image, $camp->id, '/images/camps/', $camp, 'main_image');
        

        return ['message' => 'Camp Created'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Camp  $camp
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $camp = Camp::with('categories')->find($id);

          

        if (!fileExists($camp->main_image)) {
           $camp->main_image = ""; 
        }

        return response()->json($camp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Camp  $camp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $camp = Camp::with('categories')->find($id);         

        if (!fileExists($camp->main_image)) {
           $camp->main_image = ""; 
        }        

        return response()->json($camp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Camp  $camp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
             'title' =>'required',
             'category_id' =>'required',  
             'max_age' =>'required',
             'min_age' => 'required',             
             'end_date' => 'required',
             'section' => 'required',
             'start_date' =>'required',
             'end_date' => 'required'

         ]);  

        $camp = Camp::find($id); 

        $camp->update(request(['title', 'category_id', 'section', 'max_age', 'min_age', 'start_date', 'end_date','short_blurb','listing_blurb', 'long_blurb', 'registration_url', 'forms_url', 'camp_site_map_url']));

        saveImage($request->main_image, $id, '/images/camps/', $camp, 'main_image');
        

        return ['message' => 'Camp Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Camp  $camp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $camp = Camp::find($id);

        
        if (fileExists($camp->main_image)) {
           unlink(public_path().$camp->main_image);
        }

        $camp->delete();

        return ['message' => 'Camp Deleted'];
    }

}
