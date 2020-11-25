@extends('layouts.app')

@section('content')
<div class="block h-32 justify-between items-center">
  <div class="flex w-full h-full relative" >
    <h1 class="flex w-full my-auto justify-center text-4xl text-blue-800">
      Supprimez vos annonces
    </h1>
  </div>
</div>
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
<div>
    <div class="my-6">
        <h1 class="flex w-full my-auto justify-center text-3xl text-blue-800">
            Prenez votre temps ;)
        </h1>
    </div>
    <div class="flex flex-wrap">
        @foreach ($adds as $add)
        @if($add->user_id == Auth::id())
        <div class="flex-add px-3 h-108 py-5 mx-auto mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-200">
            <div class="relative w-full h-72 mb-2">    
                <img src="{{ asset('uploads/' . $add->image) }}" alt="" class="object-fill h-full w-full">
            </div>
            <div class="relative w-full h-1/3">
                <div class="block mb-2">
                    <h2 class="break-all text-xl font-bold text-blue-800">
                        {{ $add->title }}
                    </h2>
                </div>
                <div class="block mb-2">
                    <p class="break-all text-md text-gray-800">
                        {{ $add->description }}
                    </p>
                </div>
            </div>
            <div class="block">
                <form method="POST" action="{{ route('image_supprimer') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $add->id }}">
                    <button type="submit" class="bg-red-500 text-white hover:bg-red-700 transition ease-in-out duration-500 rounded-md shadow-md w-full block px-4 py-2 mt-3">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection