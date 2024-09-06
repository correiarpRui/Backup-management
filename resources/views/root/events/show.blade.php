@extends('layouts.root')

@section('content')
    <div class="flex flex-col gap-3 m-5 items-center justify-center">
        <p class="text-bblue text-3xl mx-5 font-normal">Log data for {{ $event->name }}</p>
        <a
            href="http://localhost:8200/ngax/index.html#/restore/{{ abs((int) filter_var($event->duplicati_index, FILTER_SANITIZE_NUMBER_INT)) }}"class="bg-white border border-borderColor py-2 px-4 rounded-lg text-bblue font-semibold hover:bg-bblue hover:text-white shadow-md shadow-gray-300">Restore
            Link
        </a>
    </div>

    <div class="bg-white min-w-[200px] max-w-[750px]
            min-h-[50px] h-[70vh] mb-10 m-auto">
        <textarea name="log" id="log" readonly class="size-full resize-none">{{ $log }}</textarea>
    </div>
@endsection
