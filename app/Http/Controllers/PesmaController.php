<?php

namespace App\Http\Controllers;

use App\Models\Pesma;
use Illuminate\Http\Request;
use App\Http\Resources\PesmaResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PesmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static $wrap='pesma';
    public function index()
    {
        $pesmas=Pesma::all();

        $my_pesma=array();
        foreach($pesmas as $pesma){
            array_push($my_pesmas,new BookResource($pesma));
        }

        return $my_pesmas;
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
        
        $pesma=new Pesma;
        $pesma->name=$request->name;
        $pesma->publishinghouse=$request->publishinghouse;
        $pesma->user_id=Auth::user()->id;
        $pesma->category_id=$request->category_id;
        $pesma->author_id=$request->author_id;

        $book->save();

        return response()->json(['Pesma stored successfully',new PesmaResource($pesma)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pesma  $pesma
     * @return \Illuminate\Http\Response
     */
    public function show(Pesma $pesma)
    {
        return new PesmaResource($pesma);
    }

    public function getByIzvodjac($izvodjac_id){
        $pesmas=Pesma::get()->where('izvodjac_id',$izvodjac_id);

        if(count($pesmas)==0){
            return response()->json('Izvodjac with this id does not exist!');
        }

        $my_pesmas=array();
        foreach($pesmas as $pesma){
            array_push($my_pesmas,new BookResource($pesma));
        }

        return $my_pesmas;
    }
    public function myPesmas(Request $request){
        $pesmas=Pesma::get()->where('user_id',Auth::user()->id);
        if(count($pesmas)==0){
            return 'You dont have saved books!';
        }
        $my_pesmas=array();
        foreach($pesmas as $book){
            array_push($my_pesmas,new BookResource($book));
        }

        return $my_pesmas;
    }

    public function getByCategory($category_id){
        $pesmas=Pesma::get()->where('kategorija_id',$category_id);

        if(count($pesmas)==0){
            return response()->json('This category id does not exist!');
        }

        $my_pesmas=array();
        foreach($pesmas as $pesma){
            array_push($my_pesmas,new BookResource($pesma));
        }

        return $my_pesmas;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pesma  $pesma
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesma $pesma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pesma  $pesma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesma $pesma)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|String|max:255',
            'duration'=>'required|Integer|max:30',
            'publishinghouse'=>'required|String|max:255',
            'author_id'=>'required',
            'category_id'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $pesma->name=$request->name;
        $pesma->duration=$request->duration;
        $pesma->publishinghouse=$request->publishinghouse;
        
        $pesma->author_id=$request->author_id;
        $pesma->category_id=$request->category_id;
        $pesma->user_id=Auth::user()->id;

        $result=$pesma->update();

        if($result==false){
            return response()->json('Problem updating book!');
        }
        return response()->json(['Pesma updated successfully!',new PesmaResource($pesma)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pesma  $pesma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesma $pesma)
    {
        $pesma->delete();

        return response()->json('Book '.$pesma->name .'deleted successfully!');
    }
}
