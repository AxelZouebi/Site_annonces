@extends('layouts.app')

@section('content')
<div class="block h-32 justify-between items-center">
  <div class="flex w-full h-full relative" >
    <h1 class="flex w-full my-auto justify-center text-4xl text-blue-800">
      Tableau de bord
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
            Mes annonces
        </h1>
    </div>
    <div class="flex flex-wrap">
        @foreach ($adds as $add)
        @if($add->user_id == Auth::id())
        <div class="flex-add px-3 h-96 w-3/4 py-5 mx-auto mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-200">
            <div class="relative w-full h-56 mb-2 border-2 border-black">    
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
</div>
@endsection