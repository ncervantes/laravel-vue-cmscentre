<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\StyleSheet;

class StyleSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $style_sheets = StyleSheet::all();

        return response()->json(['style_sheets'=>$style_sheets]);
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
            'title' =>'required'
        ]);
       

        $style_sheet = StyleSheet::create(request(['title']));
                
        return ['message' => 'StyleSheet Created'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $style_sheet = StyleSheet::find($id);  

        return response()->json($style_sheet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $style_sheet = StyleSheet::find($id); 

        return response()->json($style_sheet);
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

        $style_sheet = StyleSheet::find($id); 

        $style_sheet->update(request(['title']));                   

        return ['message' => 'StyleSheet Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $style_sheet = StyleSheet::find($id);

        $style_sheet->delete();

        return ['message' => 'StyleSheet Deleted'];
    }
}
