<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\EventCategory;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventcategories = EventCategory::all();

        return response()->json(['eventcategories'=>$eventcategories]);
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
             'description' =>'required',  
         ]);

        
        $eventcategory = EventCategory::create(request(['title', 'description']));

        return ['message' => 'Event Category Created'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventcategory = EventCategory::find($id);
        $eventcategory->description = strip_tags($eventcategory->description);

        return response()->json($eventcategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventcategory = EventCategory::find($id);

        return response()->json($eventcategory);
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
             'description' =>'required',  
         ]);

        $eventcategory = EventCategory::find($id); 

        $eventcategory->update(request(['title', 'description']));      
        

        return ['message' => 'Event Category Created'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eventcategory = EventCategory::find($id);
        
        $eventcategory->delete();

        return ['message' => 'Event Category Deleted'];
    }
}
