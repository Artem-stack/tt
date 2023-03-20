@extends('layout')

@section('title','Change genre')

@section('content')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{ 'Change genre' }}</h3>

        <div class="mt-8">
             <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST" action="{{ route("genre.update", $genre->id) }}">
             	  @method('PUT')
                @csrf

                <input name="name" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('name') border-red-500 @enderror" placeholder="name" value="{{ $genre->name }}" />

                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

              
           
                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Save</button>
            </form>
        </div>
    </div>
@endsection

