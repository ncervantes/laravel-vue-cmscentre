<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Group;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return response()->json(['users'=>$users]);
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
            'name' =>'required',
            'username' =>'required',
            'company' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
       

        $user = User::create(request(['name', 'username', 'company', 'phone', 'email', 'password']));

        if ($request['selected']) {
            $group = Group::find($request['selected']);
            $user->groups()->attach($group);
        }
            
        return ['message' => 'User Created'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id); 

        $user->selected = $user->groups()->get(['group_id', 'title']);     

        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id); 

        $user->selected = $user->groups()->get(['group_id', 'title']);         

        $group_selected = json_decode($user->selected);

        $group_ids = []; 

        if(count($group_selected) > 0 ) {
            for($i=0; $i < count($group_selected); $i++ ) {
                $group_ids[$i] = $group_selected[$i]->group_id;
            }
        }

        $user->unselected = Group::select('id', 'title')->whereNotIn('id', $group_ids)->get(); 

        return response()->json($user);
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
            'name' =>'required',
            'username' =>'required',
            'company' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);   

        $user = User::find($id); 

        $user->update(request(['name', 'username', 'company', 'phone', 'email', 'password'])); 

        
        if (count($request['selected']) > 0) {
            $group = Group::find($request['selected']);
            $user->groups()->sync($group);
        } else {
            $user->groups()->detach();
        }

        return ['message' => 'User Updated'];
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->groups()->detach();

        $user->delete();

        return ['message' => 'User Deleted'];
    }
}
