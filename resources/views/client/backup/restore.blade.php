@extends('layouts.client')

@section('content')
    <div class="flex justify-between m-5 items-center">
        <p class="text-bblue text-3xl mx-5 font-normal">{{ $backup->name }}</p>
        <form action="{{ route('client.backups.filter', ['id' => $backup->id, 'clientId' => $client->id]) }}" method="GET"
            class="flex gap-4 p-4 items-center">
            @csrf
            <div class="px-3 py-1 rounded-xl bg-white shadow-gray-300 shadow-md">
                <label for="startDate" class="font-semibold text-bblue">Start Date:</label>
                <input type="date" name="startDate" id="start" class="bg-white focus:outline-none">
            </div>
            <div class="px-3 py-1 rounded-xl bg-white shadow-gray-300 shadow-md">
                <label for="endDate" class="font-semibold text-bblue">End Date:</label>
                <input type="date" name="endDate" id="end" class="bg-white focus:outline-none">
            </div>
            <button class=" bg-bblue text-white  p-3 mr-5 rounded-md w-auto inline-block shadow-md shadow-gray-300">
                Filter
            </button>
        </form>
    </div>

    <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3 flex gap-2 flex-col">
        <table class="border-collapse m-4">
            <thead>
                <tr class="font-semibold text-bblue border-b-2 border-bblue">
                    <td class="p-2">
                        <div class="flex items-center ">
                            <p class="mr-1">Backup Name</p>
                        </div>
                    </td>
                    <td class="p-2">
                        <div class="flex items-center ">
                            <p class="mr-1">Start</p>
                        </div>
                    </td>
                    <td class="p-2">
                        <div class="flex items-center ">
                            <p class="mr-1">End</p>
                        </div>
                    </td>
                    <td class="p-2">
                        <div class="flex items-center ">
                            <p class="mr-1">Action</p>
                        </div>
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($backup->reports as $event)
                    <tr class="even:bg-blgray">
                        <td class="p-2">{{ $event->name }}</td>
                        <td class="p-2">{{ \Carbon\Carbon::parse($event->begin_time)->format('d-m-Y h:i A') }}
                        </td>
                        <td class="p-2">{{ \Carbon\Carbon::parse($event->end_time)->format('d-m-Y h:i A') }}
                        </td>
                        <td class="p-2">
                            <a href="{{ route('client.backups.email', $event->id) }}"
                                class="text-bblue font-semibold">Restore</a>
                        </td>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
