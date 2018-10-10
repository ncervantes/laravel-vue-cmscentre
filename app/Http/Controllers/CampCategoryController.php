<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CampCategory;

class CampCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campcategories = CampCategory::all();

        return response()->json(['campcategories'=>$campcategories]);
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
        ]);
       


        $campcategory = CampCategory::create(request(['title']));

              
        return ['message' => 'Camp Category Created'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campcategory = CampCategory::find($id);  
          

        return response()->json($campcategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        

        $campcategory = CampCategory::find($id);         

        return response()->json($campcategory);
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
        ]);   

        $campcategory = CampCategory::find($id); 

        $campcategory->update(request(['title'])); 
      

        return ['message' => 'Camp Category Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campcategory = CampCategory::find($id);
  

        $campcategory->delete();

        return ['message' => 'Camp Category Deleted'];

    }
}
