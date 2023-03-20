<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\Admin\PostFormRequest;
use Validator;
use App\Http\Requests;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genre = genre::all();
        $movies = Movie::orderBy("name")->paginate(3);
      
        return view("movie.index", [
            "genre" => $genre,
            "movies" => $movies,
        ]);
    }

    public function by()
    {
        
        $movies = Movie::all();
      
        return view("movie.by", [
            "movies" => $movies,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $genre = genre::all();
        $movies = Movie::all(); 
   
       return view("movie.create",[
        "movies" => $movies,
        "genre" => $genre,
       ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:255',
            'genre_id' => 'required',           
            'image' => 'image|mimes:jpeg,png,jpg|max:5mb',
    ]);
       $data = $request->validated();
  
        if 
    ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = "$profileImage";
        }

        Movie::create($data);

        return redirect(route("movies.index"));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $genre = Genre::all();
       $movie = Movie::findOrFail($id);

        return view("movie.create", [
            'movie' => $movie,
            'genre' => $genre,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(MovieRequest $request, $id)
    {
        $movie = Movie::findOrFail($id);

        $movie->update($request->validated());

        return redirect(route("movies.index"));
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function destroy($id)
    {
        Movie::destroy($id);

        return redirect(route("movies.index"));
    }
}
