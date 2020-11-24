<div class="flex-add mx-3 px-3 py-5 w-full mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-200">
  <h2 class="text-xl font-bold text-green-800">
    {{ $job->title }}
  </h2>
  <p class="text-md text-gray-800">
    {{ $job->description }}
  </p>
  <div>
    <span class="text-sm text-gray-600">
      {{ number_format($job->price / 1, 2, ',', '' ) . " €"}}
    </span>
  </div>
</div>
