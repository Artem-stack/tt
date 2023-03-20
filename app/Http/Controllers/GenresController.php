<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use App\Models\Movie;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $genre = Genre::paginate(2);
      
        return view("genre.index", [
            "genre" => $genre,
        ]);
    }

    public function movieswith()
    {
         $genre = Genre::all();
      
        return view("genre.movieswith", [
            "genre" => $genre,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Genre $id)
    {
        $genre = Genre::all();
       return view("genre.create",[
        "genre" => $genre
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreRequest $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:255',
           
    ]);
       $data = $request->validated();
  
        
        Genre::create($data);

        return redirect(route("genre.index"));
    }

public function category(Request $request, $cat_alias) {
  
        $cat = Genre::where('id',$cat_alias)->first();
        $paginate = 14;
        $category = Movie::where('genre_id',$cat->id)->paginate($paginate);

    return view('genre.category',[
            'cat' => $cat,
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $genre = Genre::findOrFail($id);

        return view("genre.edit", compact('genre')
    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GenreRequest $request, $id)
    {
        $request->validate([
            'name'=>'required|min:2|max:256',
        ]); 
        $genre = Genre::findOrFail($id);

        $genre->update($request->validated());

        return redirect(route("genre.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Genre::destroy($id);

        return redirect(route("genre.index"));
    }
}
