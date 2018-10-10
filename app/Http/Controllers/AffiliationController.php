<?php

namespace App\Http\Controllers;

use App\Affiliation;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

include('includes/functions.php');

class AffiliationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $affiliations = Affiliation::all();

        return response()->json(['affiliations'=>$affiliations]);
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

        $this->validate($request, [
            'title' =>'required',
            'url' => 'required',             
            'body' => 'required'
        ]);
       

        $affiliation = Affiliation::create(request(['title', 'url', 'body']));

        saveImage($request->path_image, $affiliation->id, '/images/affiliations/', $affiliation, 'path_image');

        
        return ['message' => 'Affiliation Created'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $affiliation = Affiliation::find($id);  

        if (!fileExists($affiliation->path_image)) {
           $affiliation->path_image = ""; 
        }      

        return response()->json($affiliation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        

        $affiliation = Affiliation::find($id);         

        if (!fileExists($affiliation->path_image)) {
           $affiliation->path_image = ""; 
        }              

        return response()->json($affiliation);
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
             'url' => 'required',             
             'body' => 'required'
        ]);   

        $affiliation = Affiliation::find($id); 

        $affiliation->update(request(['title', 'url', 'body' ])); 

        if(str_contains($request->path_image, 'data')) {
            saveImage($request->path_image, $id, '/images/affiliations/', $affiliation, 'path_image' );
        }           

        return ['message' => 'Affiliation Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affiliation = Affiliation::find($id);
        
        if($affiliation->path_image != null || $affiliation->path_image != "") {
            if (fileExists($affiliation->path_image)) {
               unlink(public_path().$affiliation->path_image);
            }  
        }

        $affiliation->delete();

        return ['message' => 'Affiliation Deleted'];

    }
    
}
