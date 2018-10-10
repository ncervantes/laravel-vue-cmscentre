<?php

namespace App\Http\Controllers;

use App\Festival;
use App\Affiliation;
use Illuminate\Http\Request;

include('includes/functions.php');

class FestivalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $festivals = Festival::with('affiliations')->get();

        return response()->json(['festivals'=>$festivals]);
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
             'affiliation_id' =>'required',  
             'listingblurb' => 'required',             
             'longblurb' => 'required',
             'section' => 'required',             
         ]);
        
        $festival = Festival::create(request(['title', 'affiliation_id', 'section', 'listingblurb', 'longblurb', 'pagination']));

        saveImage($request->path_thumbnail, $festival->id, '/images/festivals/thumbnail/', $festival, 'path_thumbnail');
        saveImage($request->path_main, $festival->id, '/images/festivals/main/', $festival, 'path_main');

        return ['message' => 'Festival Created'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $festival = Festival::with('affiliations')->find($id);

        if (!fileExists($festival->path_thumbnail)) {
           $festival->path_thumbnail = ""; 
        }  

        if (!fileExists($festival->path_main)) {
           $festival->path_main = ""; 
        }

        return response()->json($festival);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $festival = Festival::with('affiliations')->find($id);

        if (!fileExists($festival->path_thumbnail)) {
           $festival->path_thumbnail = ""; 
        }  

        if (!fileExists($festival->path_main)) {
           $festival->path_main = ""; 
        }        

        return response()->json($festival);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
             'title' =>'required',
             'affiliation_id' =>'required',  
             'listingblurb' => 'required',             
             'longblurb' => 'required',
             'section' => 'required',             
         ]);

        $festival = Festival::find($id); 

        $festival->update(request(['title', 'affiliation_id', 'listingblurb', 'longblurb', 'section', 'pagination' ]));

        if(str_contains($request->path_thumbnail, 'data')) {
            saveImage($request->path_thumbnail, $id, '/images/festivals/thumbnail/', $festival, 'path_thumbnail');             
        }

        if(str_contains($request->path_main, 'data')) {
            saveImage($request->path_main, $id, '/images/festivals/main/', $festival, 'path_main');             
        }

        return ['message' => 'Festival Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $festival = Festival::find($id);

        if($festival->path_thumbnail != null || $festival->path_thumbnail != "") {
            if (fileExists($festival->path_thumbnail)) {
               unlink(public_path().$festival->path_thumbnail);
            }
        }

        if($festival->path_main != null || $festival->path_main != "") {
            if (fileExists($festival->path_main)) {
               unlink(public_path().$festival->path_main);
            }
        }

        $festival->delete();

        return ['message' => 'Festival Deleted'];
    }

    
}
