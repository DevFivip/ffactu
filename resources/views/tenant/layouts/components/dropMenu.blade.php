<a class="{{ $visible ?'shadow-soft-xl bg-white font-semibold':'' }} py-1 text-size-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4  text-slate-700 transition-colors" href="{{route('tenant.documents.create')}}">
    <div class="{{ $visible ?'bg-gradient-fuchsia':'' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg  bg-center stroke-0 text-center xl:p-2.5">
        <i class="fa-solid fa-plus {{ $visible ?'text-white':''}}"></i>
    </div>
    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ $title }}</span>
</a>

<ul class="py-2 space-y-2" style="display:hidden;">
{{ $slot }}
</ul>