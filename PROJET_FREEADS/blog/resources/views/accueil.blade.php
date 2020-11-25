@extends('layouts.app')

@section('content')
  <div class="block h-24">
    <div class="my-8 flex w-full h-full justify-center relative">
      <p class="h-12 my-auto text-3xl text-center text-blue-800">
        <h1>Trouvez votre Click & Collect !</h1>
      </p>
    </div>
  </div>
  <div class="block h-36 justify-between items-center bg-img-map">
    @livewire('search-city')
  </div>
  <div class="block h-20">
    <div class="flex w-full h-full justify-center relative">
      <p class="h-12 my-auto text-3xl text-center text-blue-800">
        <h2>Les dernières annonces partout en France !</h2>
      </p>
    </div>
  </div>
  <div class="flex flex-wrap">
  @foreach($jobs as $job)
  <div class="flex-add px-3 h-96 py-5 mx-auto mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-200">
    <div class="relative w-full h-64 mb-2 border-2 border-black">    
        <img src="{{ asset('uploads/' . $job->image) }}" alt="" class="object-fill h-full w-full">
    </div>
    <div class="relative w-full h-1/3">
        <div class="block mb-2">
            <h2 class="break-all text-xl font-bold text-green-800">
                {{ $job->title }}
            </h2>
        </div>
        @foreach ($city as $cities)
        <div class="block mb-2">
            <p class="break-all text-md text-gray-800">
                @if($cities->id == $job->city_id)    
                    {{ $cities->cities }}
                @endif
            </p>
        </div>
        @endforeach
        <div class="block mb-2">
            <p class="break-all text-md text-gray-800">
                {{ $job->description }}
            </p>
        </div>
        <div class="block mb-2">
            <span class="text-sm text-gray-600">
                {{ number_format($job->price / 1, 2, ',', '' ) . " €"}}
            </span>
        </div>
    </div>
  </div>
  @endforeach
</div>
@endsection