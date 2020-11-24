<div class="flex w-full h-full my-auto justify-center relative" x-data="{ open: true }" x-on:keydown.escape="open = false; @this.resetIndex();">
    <input type="search" placeholder="Chercher votre Click & Collect !" class="block w-2/4 items-center focus:border-blue-800 border-2 rounded-full my-auto py-1 px-2" @click.prevent="open = true" 
    wire:model="query"
    wire:keydown.prevent.arrow-down="incrementIndex()"
    wire:keydown.prevent.arrow-up="decrementIndex()"
    wire:keydown.prevent.enter="selectIndex()"
    wire:keydown.backspace="resetIndex()"
    x-on:click.away="open = false; @this.resetIndex();">
    @if (strlen($query) >= 2)
        <div class="z-10 w-2/4 bg-white border border-blue-800 rounded px-2 py-1 mt-36 flex flex-col absolute" x-show="open">
        @if (count($jobs) > 0)
            @foreach ($jobs as $index => $job)
                <a href="" class="{{ ($index === $selectedIndex) ? 'text-blue-800' : '' }} my-2">{{ $job['title'] }}</a>
            @endforeach 
        @else
        <span>0 résultat pour "{{ $query }}"</span>
        @endif
    @endif
    </div>
</div>