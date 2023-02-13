@extends('layout.admin')

@section('title','Add position')

@section('content')

    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{ 'Add position' }}</h3>

        <div class="mt-8">
             <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST" action="{{ route('admin.position.store') }}">
                @csrf

                <input name="name" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('name') border-red-500 @enderror" placeholder="name" value="{{ $positions->name ?? '' }}" />

                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <div class="mt-8">
           <?php $admin_created_id = Auth::user()->id; 
    $admin_updated_id = $admin_created_id; ?>
                 <input name="admin_created_id" type="hidden" value="{{ $admin_created_id ?? '' }}" />

                   <input name="admin_updated_id" type="hidden" value="{{ $admin_updated_id ?? '' }}" />
 
                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Сохранить</button>
            </form>
        </div>
    </div>
@endsection

