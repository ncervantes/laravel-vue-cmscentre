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

         $image = explode(',', $request->img);   

         $decoded = base64_decode($image[1]);

         if(str_contains($image[0], ['jpeg','jpg']))
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

        return response()->json($affiliation);
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

         if(str_contains($request->img, 'data')) {

             $image = explode(',', $request->img);   

             $decoded = base64_decode($image[1]);

             if(str_contains($image[0], ['jpeg','jpg']))
                $extension = 'jpg';
             else 
                 $extension = 'png';

             $filename = $id . '.'. $extension;

             $path = public_path().'/images/affiliations/';

             if (file_exists($path.$id.'.jpg')) unlink($path.$id.'.jpg');
             if (file_exists($path.$id.'.png')) unlink($path.$id.'.png');

             file_put_contents($path.$filename, $decoded);
        }

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

    public function getImageExtension($img)
    {
       if(str_contains($img, ['jpeg','jpg']))
            $extension = 'jpg';
         else 
             $extension = 'png';
       return $extension;  
    }
}
