@extends('layout')

@section('title',  isset($movie) ? "Edit movie ID {$movie->id}" : 'Add movie')

@section('content')

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />

    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{ isset($movie) ? "Edit movie ID {$movie->id}" : 'Add movie' }}</h3>

        <div class="mt-8">
             <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST" action="{{ isset($movie) ? route("movies.update", $movie->id) : route('movies.store') }}">
                @csrf

                @if(isset($movie))
                    <input type="hidden" name="id" value="{{ $movie->id }}"/>

                    @method('PUT')
                @endif

                <div class="form-group">
                    <input type="file" name="image" class=" @error('image') border-red-500 @enderror" value="{{ $movie->image ?? '' }}">
                </div>

                    @error('image')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
               
                <input name="name" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('name') border-red-500 @enderror" placeholder="name" value="{{ $movie->name ?? '' }}" />

                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

               
                <h1>Genre</h1>
 <select id="genre_id" placeholder="genre_id" type="text" value="{{ $movie->genre_id ?? '' }}" name="genre_id" class="w-full h-12 border border-gray-800 rounded px-3 @error('genre_id') border-red-500 @enderror">
  @foreach($genre as $genres)
  <option value="{{ $genres->id ?? '' }}" >{{$genres->name}}</option>
  @endforeach
</select>
                @error('genre_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Save</button>
            </form>
        </div>
    </div>
@endsection