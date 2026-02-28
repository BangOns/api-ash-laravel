@props(['categories' => [],
'key'=> ''
])

<form method="GET" action="/" class="w-full mt-5 flex items-center gap-3">

  <select name="category" id="countries"  onchange="this.form.submit()" class="block w-full px-3 py-2.5 cursor-pointer  bg-neutral-secondary-medium border border-default-medium  text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
      <option  >Pilih API</option>
         @foreach ($categories as $category)
        <option 
            value="{{ $category }}"
            {{ $key == $category ? 'selected' : '' }}
        >
            {{ $category }}
        </option>
    @endforeach
  </select>
  @if($key)
    <button type="button" onclick="window.location.href='/'" class="px-4 py-2 bg-slate-300 text-slate-800 rounded hover:bg-slate-400 cursor-pointer">
  <x-heroicon-o-trash  class="h-6 w-6 text-red-600" />
    </button>
  @endif
</form>