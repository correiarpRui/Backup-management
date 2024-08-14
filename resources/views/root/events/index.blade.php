@extends('layouts.root')

@section('content')
    <div>
        <div class="text-bblue text-3xl mx-5 my-3 font-normal ">Events</div>

        @foreach ($data as $item)
            <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3">
                <p class="text-2xl text-bblue">{{ $item->name }}</p>
                <hr class="h-[3px] mx-auto mt-2  rounded  bg-bblue">
                @foreach ($item->reports as $item)
                    <p>Operation: {{ $item->operation_name }}</p>
                    <p>Started: {{ $item->begin_time }}</p>
                    <p>Ended: {{ $item->end_time }}</p>
                    <p>Duration: {{ $item->duration }}</p>
                    <p>Warnings: {{ $item->warnings }}</p>
                    <p class="mb-4">Errors: {{ $item->errors }}</p>
                @endforeach
            </div>
        @endforeach

    </div>
@endsection
