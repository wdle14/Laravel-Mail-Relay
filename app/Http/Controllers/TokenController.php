<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Models\Token::get();
        return view('token.index',compact('data'));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('token.new');
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
            'client_name' => 'required',            
        ]);

        $data = new \App\Models\Token;
        $data->client_name = $request->client_name;
        $data->token = \Str::random(80);
        if($data->save()){
            flash()->success('Token Have Been Created');
            return redirect()->route('tokens.index');  
        }else{
            flash()->warning('Failed');
            return redirect()->route('tokens.index'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = \App\Models\Token::findOrFail($id);
        return view('token.edit',compact('data'));
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
        $data = \App\Models\Token::findOrFail($id);
        $update = $request->all();
        $data->update(['client_name'=>$update['client_name']]);
        flash()->success('Token Have Been Update');
        return redirect()->route('tokens.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( \App\Models\Token::findOrFail($id)->delete() ) {
            flash()->success('Token Has Been Deleted');
        } else {
            flash()->success('Token not deleted');
        }
        return redirect()->back();
    }
}
