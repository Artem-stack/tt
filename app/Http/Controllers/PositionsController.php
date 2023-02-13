<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\PositionRequest;
use App\Models\Position;

class PositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $position = Position::paginate(12);
      
        return view("admin.position.position", [
            "position" => $position,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Position $id)
    {
        $position = Position::all();
       return view("admin.position.create",[
        "position" => $position
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PositionRequest $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:255',
            'admin_created_id' => 'required',
            'admin_updated_id' => 'required',
           
    ]);
       $data = $request->validated();
  
        
        Position::create($data);

        return redirect(route("admin.position.position"));
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
         $position = Position::findOrFail($id);

        return view("admin.position.edit", compact('position')
    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PositionRequest $request, $id)
    {
        $request->validate([
            'name'=>'required|min:2|max:256',
            'admin_updated_id'=>'required',
        ]); 
        $position = Position::findOrFail($id);

        $position->update($request->validated());

        return redirect(route("admin.position.position"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Position::destroy($id);

        return redirect(route("admin.position.position"));
    }
}
