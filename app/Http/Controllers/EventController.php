<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Festival;
use App\Affiliation;
use App\Discipline;

include('includes/functions.php');

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with('affiliations')->with('festivals')->get();

        return response()->json(['events'=>$events]);
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
             'affiliation_id' =>'required',  
             'festival_id' => 'required',
             'listingblurb' => 'required',             
             'longblurb' => 'required',
             'shortblurb' => 'required'            
         ]);
        
        $event = Event::create(request(['title', 'affiliation_id', 'festival_id', 'listingblurb', 'longblurb', 'shortblurb', 'ticketsURL', 'directionsURL', 'prices']));

        saveImage($request->thumbnail_path, $event->id, '/images/events/thumbnail/', $event, 'thumbnail_path');
        saveImage($request->main_path, $event->id, '/images/events/main/', $event, 'main_path');


        $discipline = Discipline::find($request['selected']);
        $event->disciplines()->attach($discipline);

        return ['message' => 'Event Created'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::with('affiliations')->with('festivals')->find($id);
        $allselected = $event->disciplines()->allRelatedIds()->toArray();
        
        $option = [];

        if(count($allselected)) {
            for($i=0; $i < count($allselected); $i++)   {
                 $option[$i] = Discipline::select('title')->find($allselected[$i]);
             }
        }
        $event->selected = $option;



        if (!fileExists($event->thumbnail_path)) {
           $event->thumbnail_path = ""; 
        }  

        if (!fileExists($event->main_path)) {
           $event->main_path = ""; 
        }

        return response()->json($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::with('affiliations')->with('festivals')->find($id);

        $event->selected = $event->disciplines()->allRelatedIds()->toArray();


        if (!fileExists($event->thumbnail_path)) {
           $event->thumbnail_path = ""; 
        }  

        if (!fileExists($event->path_main)) {
           $event->main_path = ""; 
        }        

        return response()->json($event);
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
             'affiliation_id' =>'required',  
             'festival_id' => 'required',
             'listingblurb' => 'required',             
             'longblurb' => 'required',
             'shortblurb' => 'required'            
         ]);

        $event = Event::find($id); 

        $event->update(request(['title', 'affiliation_id', 'festival_id', 'listingblurb', 'longblurb', 'shortblurb', 'ticketsURL', 'directionsURL', 'prices']));
       

        $discipline = Discipline::find($request['selected']);
        $event->disciplines()->sync($discipline);

        if(str_contains($request->thumbnail_path, 'data')) {
            saveImage($request->thumbnail_path, $id, '/images/events/thumbnail/', $event, 'thumbnail_path');             
        }

        if(str_contains($request->main_path, 'data')) {
            saveImage($request->main_path, $id, '/images/events/main/', $event, 'main_path');             
        }

        return ['message' => 'Event Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);

        if($event->thumbnail_path != null || $event->thumbnail_path != "") {
            if (fileExists($event->thumbnail_path)) {
               unlink(public_path().$event->thumbnail_path);
            }
        }

        if($event->main_path != null || $event->main_path != "") {
            if (fileExists($event->main_path)) {
               unlink(public_path().$event->main_path);
            }
        }

        $event->disciplines()->detach();

        $event->delete();


        return ['message' => 'Event Deleted'];
    }
}
