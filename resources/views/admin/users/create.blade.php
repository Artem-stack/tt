@extends('layout.admin')

@section('title',  isset($user) ? "Edit user ID {$user->id}" : 'Add user')

@section('content')

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />

    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{ isset($user) ? "Edit user ID {$user->id}" : 'Add user' }}</h3>

        <div class="mt-8">
             <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST" action="{{ isset($user) ? route("admin.users.update", $user->id) : route('admin.users.store') }}">
                @csrf

                @if(isset($user))
                    <input type="hidden" name="id" value="{{ $user->id }}"/>

                    @method('PUT')
                @endif

                <div class="form-group">
                    <input type="file" name="image" class=" @error('image') border-red-500 @enderror" value="{{ $user->image ?? '' }}">
                </div>

                    @error('image')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
               
  
                <input name="email" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('email') border-red-500 @enderror" placeholder="E-mail" value="{{ $user->email ?? '' }}" />

                @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

 <?php $admin_created_id = Auth::user()->id; 
    $admin_updated_id = $admin_created_id; ?>
                 <input name="admin_created_id" type="hidden" value="{{ $admin_created_id ?? '' }}" />

                   <input name="admin_updated_id" type="hidden" value="{{ $admin_updated_id ?? '' }}" />


                <input name="name" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('name') border-red-500 @enderror" placeholder="name" value="{{ $user->name ?? '' }}" />

                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                  <input name="salary" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('salary') border-red-500 @enderror" placeholder="salary" value="{{ $user->salary ?? '' }}" />

                @error('salary')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

               

                 <input name="phone" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('phone') border-red-500 @enderror" placeholder="phone" value="{{ $user->phone ?? '' }}" />

                @error('phone')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror


      
        <div classs="form-group">
            <input type="text" id="search" name="head" placeholder="Head" class="w-full h-12 border border-gray-800 rounded px-3 @error('head') border-red-500 @enderror" value="{{ $user->head ?? '' }}"/>
     
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>
    <script type="text/javascript">
        var route = "{{ url('autocomplete-search') }}";
        $('#search').typeahead({
            source: function (query, process) {
                return $.get(route, {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });
    </script>
                @error('head')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                @if(isset($user))
 <div class="container">
  <div class="row">
    <div class="col">Created_at: {{$user->created_at}}</div>
     <div class="col">Admin created id: {{$user->admin_created_id}}</div>
    <div class="w-100"></div>
    <div class="col">Created at: {{$user->created_at}}</div>
   
    <div class="col">Admin updated id: {{$user->admin_updated_id}}</div>
  </div>
</div>
    @endif
                 

                <div class="mt-8">
            <label for="created_at">
                Created_at
            </label>
            <input type="date" lang="en" id="created_at" name="created_at" class="form-control @error('created_at') is-invalid @enderror" value="{{ $user->created_at ?? '' }}">
        </div>

         @error('created_at')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <h1>Position</h1>
 <select id="position_id" placeholder="position_id" type="text" value="{{ $user->position_id ?? '' }}" name="position_id" class="w-full h-12 border border-gray-800 rounded px-3 @error('position_id') border-red-500 @enderror">
  @foreach($position as $positions)
  <option value="{{ $positions->id ?? '' }}" >{{$positions->name}}</option>
  @endforeach
</select>
                @error('position_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Save</button>
            </form>
        </div>
    </div>
@endsection
