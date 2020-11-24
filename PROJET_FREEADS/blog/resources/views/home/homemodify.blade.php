    @extends('layouts.app')

@section('content')
<div class="block h-32 justify-between items-center">
  <div class="flex w-full h-full relative" >
    <h1 class="flex w-full my-auto justify-center text-4xl text-blue-800">
      Modifier vos annonces
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
            Modifiez une annonce à la fois
        </h1>
    </div>
    <div class="flex flex-wrap">
        @foreach ($adds as $add)
        <div class="flex-add px-3 py-5 h-128 w-5/6 mx-auto mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-200">
            <form method="POST" enctype="multipart/form-data" action="{{ route('image_modifier') }}" id="modify" class="">
                @csrf
                <div class="relative w-full h-64 mb-2 border-2 border-black">
                    <img src="{{ asset('uploads/' . $add->image) }}" alt="" class="object-fill h-full w-full">    
                </div>
                <div class="mb-6">
                    <input type="file" id="image" name="image">
                </div>
                <div class="relative w-full h-1/3">
                    <div class="mb-2">
                        <h2 class="text-xl font-bold text-green-800 text-center">
                            <input id="titre" type="text" name="title" class="shadow border rounded w-full p-2" value="{{ $add->title }}" autocomplete="email" placeholder="titre" autofocus>
                            @error('title')
                                <span class="text-red-400 text-sm">
                                    <span>{{ $message }}</span>
                                </span>
                            @enderror
                        </h2>
                    </div>
                    <div class="mb-2">
                        <p class="text-md text-gray-800">
                            <input id="description" type="text" name="description" class="shadow border rounded w-full p-2" value="{{ $add->description }}" autocomplete="password" placeholder="description" autofocus>
                            @error('description')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </p>
                    </div>
                    <div class="block mb-2">
                        <select name="cities" id="villes" class="shadow border rounded w-full p-2">
                            @foreach ($city as $cities)
                                    @if($cities->id == $add->city_id)    
                                        <option value="{{ $cities->id }}">
                                            {{ $cities->cities }}
                                        </option>
                                    @endif
                                    <option value="{{ $cities->id }}">
                                        {{ $cities->cities }}
                                    </option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="id" value="{{ $add->id }}">
                    <button type="submit" class="bg-green-500 text-white hover:bg-green-700 transition ease-in-out duration-500 rounded-md shadow-md w-full block px-4 py-2 mt-3">
                        Modifier
                    </button>
                </div>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection