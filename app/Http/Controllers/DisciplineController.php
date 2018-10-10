<?php

namespace App\Http\Controllers;

use App\Discipline;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplines = Discipline::all();

        return response()->json(['disciplines'=>$disciplines]);
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
       

        $discipline = Discipline::create(request(['title', 'display_filter']));        

        
        return ['message' => 'Discipline Created'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discipline
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $discipline = Discipline::find($id);  
 

        return response()->json($discipline);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discipline
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $discipline = Discipline::find($id);

        return response()->json($discipline);
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

        $discipline = Discipline::find($id); 

        $discipline->update(request(['title', 'display_filter'])); 
                

        return ['message' => 'Discipline Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discipline
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discipline = Discipline::find($id);
        
        $discipline->delete();

        return ['message' => 'Discipline Deleted'];
    }
}
