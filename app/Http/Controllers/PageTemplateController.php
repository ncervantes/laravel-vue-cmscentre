<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PageTemplate;

class PageTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_templates = PageTemplate::all();

        return response()->json(['page_templates'=>$page_templates]);
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
            'detail'=>'required'            
        ]);
       

        $page_template = PageTemplate::create(request(['title', 'detail']));
                
        return ['message' => 'Page Template Created'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_templates = PageTemplate::find($id);  

        return response()->json($page_templates);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_templates = PageTemplate::find($id); 

        return response()->json($page_templates);
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
             'detail'=> 'required'              
        ]);   

        $page_templates = PageTemplate::find($id); 

        $page_templates->update(request(['title', 'detail']));                   

        return ['message' => 'Page Template Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page_templates = PageTemplate::find($id);

        $page_templates->delete();

        return ['message' => 'Page Template Deleted'];

    }
}
