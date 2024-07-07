@extends('layouts.client')

@section('content')
    <div>
        <div class="text-bblue text-3xl mx-5 my-3 font-normal ">Events</div>

        @foreach ($data as $client)
            <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3">
                <p class="text-2xl text-bblue">{{ $client->name }}</p>
                <hr class="h-[3px] mx-auto mt-2  rounded  bg-bblue">
                @foreach ($client->backups as $backup)
                    @foreach ($backup->reports as $report)
                        <p>Operation: {{ $report->operation_name }}</p>
                        <p>Started: {{ $report->begin_time }}</p>
                        <p>Ended: {{ $report->end_time }}</p>
                        <p>Duration: {{ $report->duration }}</p>
                        <p>Warnings: {{ $report->warnings }}</p>
                        <p class="mb-4">Errors: {{ $report->errors }}</p>
                    @endforeach
                @endforeach
            </div>
        @endforeach

    </div>
@endsection

{{-- @foreach ($backups as $backup)
                @foreach ($backup->backups as $item)
                    <div class="flex gap-4">
                        <p>{{ $item->name }}</p>
                        <p>{{ $item->token }}</p>
                        <p>{{ $item->client_id }}</p>
                        <p>{{ $item->description }}</p>
                        <p>{{ $item->encryption }}</p>
                        <p>{{ $item->time }}</p>
                        <p>{{ $item->repeat }}</p>

                        <a href="/admin/backups/{{ $backup->id }}">Generate</a>
                    </div>
                @endforeach
            @endforeach --}}
