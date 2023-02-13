@extends('layout.admin')

@section('title','Change position')

@section('content')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{ 'Change position' }}</h3>

        <div class="mt-8">
             <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST" action="{{ route("admin.position.update", $position->id) }}">
             	  @method('PUT')
                @csrf

                <input name="name" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('name') border-red-500 @enderror" placeholder="name" value="{{ $position->name }}" />

                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <div class="mt-8">
                     @if(isset($position))
 <div class="container">
  <div class="row">
    <div class="col">Created_at: {{$position->created_at}}</div>
     <div class="col">Admin created id: {{$position->admin_created_id}}</div>
    <div class="w-100"></div>
    <div class="col">Created at: {{$position->created_at}}</div>
   
    <div class="col">Admin updated id: {{$position->admin_updated_id}}</div>
  </div>
</div>
    @endif
     <?php $admin_created_id = Auth::user()->id; 
    $admin_updated_id = $admin_created_id; ?>

     <input name="admin_created_id" type="hidden" value="{{ $admin_created_id ?? '' }}" />

    <input name="admin_updated_id" type="hidden" value="{{ $admin_updated_id ?? '' }}" />
           
                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Сохранить</button>
            </form>
        </div>
    </div>
@endsection

