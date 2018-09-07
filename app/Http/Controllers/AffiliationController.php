<?php

namespace App\Http\Controllers;

use App\Affiliation;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

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

         $affiliation = Affiliation::create(request(['title', 'url', 'body' ]));

         $image = explode(',', $request->image);   

         $decoded = base64_decode($image[1]);

         if(str_contains($image[0], 'jpeg'))
            $extension = 'jpg';
         else 
             $extension = 'png';

         $filename = $affiliation->id . '.'. $extension;

         $path = public_path().'/images/affiliations/'.$filename;

         file_put_contents($path, $decoded);

        
        return ['message' => 'Project Created'];
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

        return response()->json(array($affiliation));
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

       return ['message' => 'Project Updated'];
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

        $affiliation->delete();

        return ['message' => 'Affiliation Deleted'];

    }
}
