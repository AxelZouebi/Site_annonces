@extends('layouts.app')

@section('content')
<div class="block h-32 justify-between items-center">
  <div class="flex w-full h-full relative" >
    <h1 class="flex w-full my-auto justify-center text-4xl text-blue-800">
      Ajouter une annonce
    </h1>
  </div>
</div>
<form method="POST" enctype="multipart/form-data" action="{{ route('image') }}" class="w-full max-w-sm mx-auto rounded-lg border shadow-md p-5 mb-5">
    @csrf
    
    <div class="mb-4">
        <label for="titre" class="block font-semibold text-blue-800 mb-2">Titre</label>
        <input id="titre" type="text" name="title" class="shadow border rounded w-full p-2" value="{{ old('email') }}" placeholder="titre" autofocus>
        @error('title')
            <span class="text-red-400 text-sm">
                <span>{{ $message }}</span>
            </span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="block font-semibold text-blue-800 mb-2">Description</label>
        <input id="description" type="text" name="description" class="shadow border rounded w-full p-2" value="{{ old('password') }}" placeholder="description" autofocus>
       @error('description')
            <span class="text-red-400 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="villes" class="block font-semibold text-blue-800 mb-2">Ville</label>
        <select name="cities" id="villes" class="shadow border rounded w-full p-2">
            @foreach ($city as $cities)
                <option value="{{ $cities->id }}">
                    {{ $cities->cities }}
                </option>
            @endforeach
        </select>
        @error('cities')
            <span class="text-red-400 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-4">
        <label for="image" class="block font-semibold text-blue-800 mb-2">Image</label>
        <input type="file" id="image" name="image">
    </div>
    <button type="submit" class="bg-blue-800 text-white hover:bg-orange-700 transition ease-in-out duration-500 rounded-md shadow-md w-full block px-4 py-2 mt-3">Ajouter</button>
</form>
<div class="flex h-16 w-full justify-between text-center mb-4 bg-gray-100">
    <div class="my-4 w-1/4 mx-8">
        <a href="{{ url('home/ajouter') }}" class="text-2xl text-blue-800 hover:text-orange-600">
            Ajouter
        </a>
    </div>
    <div class="my-4 w-1/4 mx-8">
        <a href="{{ url('home/modifier') }}" class="text-2xl text-blue-800 hover:text-orange-600">
            Modifier
        </a>
    </div>
    <div class="my-4 w-1/4 mx-8">
        <a href="{{ url('home/supprimer') }}" class="text-2xl text-blue-800 hover:text-orange-600">
            Supprimer
        </a>
    </div>
</div>
<div class="my-6">
    <h1 class="flex w-full my-auto justify-center text-3xl text-blue-800">
        Mes annonces
    </h1>
</div>
<div class="flex flex-wrap">
    @foreach ($adds as $add)
    @if($add->user_id == Auth::id())
    <div class="flex-add px-3 h-108 py-5 mx-auto mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-200">
        <div class="relative w-full h-72 mb-2 border-2 border-black">    
            <img src="{{ asset('uploads/' . $add->image) }}" alt="" class="object-fill h-full w-full">
        </div>
        <div class="relative w-full h-1/3">
            <div class="block mb-2">
                <h2 class="break-all text-xl font-bold text-blue-800">
                    {{ $add->title }}
                </h2>
            </div>
            @foreach ($city as $cities)
            <div class="block mb-2">
                <p class="break-all text-md text-gray-800">
                    @if($cities->id == $add->city_id)    
                        {{ $cities->cities }}
                    @endif
                </p>
            </div>
            @endforeach
            <div class="block mb-2">
                <p class="break-all text-md text-gray-800">
                    {{ $add->description }}
                </p>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
@endsection