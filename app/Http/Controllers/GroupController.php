<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Group;

use App\User;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();

        return response()->json(['groups'=>$groups]);
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

        $group = Group::create(request(['title']));

        $user = User::find($request['selected']);
        $group->users()->attach($user);
        
        return ['message' => 'Group Created'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::find($id);   

        $group->selected = $group->users()->get(['user_id', 'name']);  

        return response()->json($group);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);

        $group->selected = $group->users()->get(['user_id', 'name']);         

        $user_selected = json_decode($group->selected); 

        $user_ids = [];


        if(count($user_selected) > 0 ) { 
            for($i=0; $i < count($user_selected); $i++ ) {
                $user_ids[$i] = $user_selected[$i]->user_id;
            }
        }

        $group->unselected = User::select('id', 'name')->whereNotIn('id', $user_ids)->get();

        return response()->json($group);
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
           'title' =>'required'             
        ]);   

        $group = Group::find($id); 

        $group->update(request(['title'])); 


        if (count($request['selected']) > 0) {
            $user = User::find($request['selected']);
            $group->users()->sync($user);
        } else {
            $group->users()->detach();
        }                 

        return ['message' => 'Group Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);

        $group->users()->detach();

        $group->delete();

        return ['message' => 'Group Deleted'];

    }
}
