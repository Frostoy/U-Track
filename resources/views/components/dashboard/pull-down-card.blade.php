@props(['title', 'contentId', 'items', 'bg', 'innerBg'])
<div class="flex-1 relative">
  <div class="mx-auto max-w-xl rounded-full {{ $bg }} text-slate-900 text-center font-semibold px-6 py-2 shadow-[0_6px_0_0_rgba(0,0,0,0.25)]">
    {{ $title }}
  </div>
  <div id="{{ $contentId }}"
       class="mx-auto max-w-xl transition-all duration-500 ease-in-out max-h-0 overflow-hidden">
    <div class="rounded-xl {{ $innerBg }} p-4 shadow">
      <ul class="list-disc pl-6 text-sm space-y-1">
        @foreach($items as $item)
          <li>{{ $item }}</li>
        @endforeach
      </ul>
    </div>
  </div>
  <div class="flex justify-center -mt-2">
    <button type="button"
            data-target="#{{ $contentId }}"
            class="h-5 w-5 rounded-full border border-black bg-white"></button>
  </div>
</div>