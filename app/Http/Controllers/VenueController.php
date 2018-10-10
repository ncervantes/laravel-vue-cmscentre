<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Venue;

include('includes/functions.php');

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = Venue::all();

        return response()->json(['venues'=>$venues]);
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
            'address' => 'required',             
            'city' => 'required',
            'province' => 'required',
            'postal' => 'required'
        ]);
       
        
        $venue = Venue::create(request(['title', 'address', 'city', 'province', 'postal', 'url', 'map_url']));

        saveImage($request->logo, $venue->id, '/images/venues/', $venue, 'logo');

        
        return ['message' => 'Venue Created'];
    }

       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venue = Venue::find($id);  

        if (!fileExists($venue->logo)) {
           $venue->logo = ""; 
        }      

        return response()->json($venue);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        

        $venue = Venue::find($id);         

        if (!fileExists($venue->logo)) {
           $venue->logo = ""; 
        }              

        return response()->json($venue);
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
        
        $this->validate($request, [
             'title' =>'required',
             'address' => 'required',             
             'city' => 'required',
             'province' => 'required',
             'postal' => 'required'
        ]);   

        $venue = Venue::find($id); 

        $venue->update(request(['title', 'address', 'city', 'province', 'postal', 'url', 'map_url' ])); 

        if(str_contains($request->logo, 'data')) {
            saveImage($request->logo, $id, '/images/venues/', $venue, 'logo' );
        }           

        return ['message' => 'Venue Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venue = Venue::find($id);

        if($venue->logo != null || $venue->logo != "") {
            if (fileExists($venue->logo)) {
               unlink(public_path().$venue->logo);
            }  
        }

        $venue->delete();

        return ['message' => 'Venue Deleted'];

    }

}
