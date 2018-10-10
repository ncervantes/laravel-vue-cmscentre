<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CampAge;

class CampAgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campages = CampAge::all();

        return response()->json(['campages'=>$campages]);
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
            'max_age' =>'required',
            'min_age' => 'required', 
        ]);
       


        $campage = CampAge::create(request(['max_age','min_age']));

              
        return ['message' => 'Camp Age Created'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campage = CampAge::find($id);  
          

        return response()->json($campage);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        

        $campage = CampAge::find($id);         

        return response()->json($campage);
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
             'max_age' =>'required',
             'min_age' => 'required', 
        ]);   

        $campage = CampAge::find($id); 

        $campage->update(request(['max_age', 'min_age'])); 
      

        return ['message' => 'Camp Age Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campage = CampAge::find($id);
  

        $campage->delete();

        return ['message' => 'Camp Age Deleted'];

    }
}
