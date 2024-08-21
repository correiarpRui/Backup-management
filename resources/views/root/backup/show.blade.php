@extends('layouts.root')

@section('content')
    <div class="flex justify-between m-5 items-center">
        <p class="text-bblue text-3xl mx-5 font-normal">Backup Details</p>
        <div class="flex gap-3">
            <a href="{{ route('root.backups.update', $backup->id) }}"
                class=" bg-bblue text-white  p-3 rounded-md w-auto inline-block">Edit</a>
            <form action="{{ route('root.backups.destroy', $backup->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class=" bg-bred text-white p-3 mr-5 rounded-md w-auto inline-block">Delete </button>
            </form>
        </div>
    </div>

    <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3 flex flex-col gap-2 py-2 px-5">
        <div>
            <p class="font-semibold text-bgray text-l ">Backup Name: </p>
            <p class="font-medium text-xl">{{ $backup->name }}</p>
        </div>
        <div>
            <p class="font-semibold text-bgray text-l ">Client Name:</p>
            <p class="font-medium text-xl">{{ $backup->client->name }}</p>
        </div>
        <div>
            <p class="font-semibold text-bgray text-l ">Description:</p>
            <p class="font-medium text-xl">{{ $backup->description }}</p>
        </div>
        <div>
            <p class="font-semibold text-bgray text-l ">Encryption:</p>
            <p class="font-medium text-xl uppercase">{{ $backup->encryption }}</p>
        </div>
        <div>
            <p class="font-semibold text-bgray text-l ">Created by:</p>
            <p class="font-medium text-xl">{{ $backup->createdBy->name }}</p>
        </div>
    </div>

    <div class="text-bblue text-3xl mx-5 font-normal px-5 ">Schedule</div>
    <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3 flex flex-col gap-2 py-2 px-5">
        <div>
            <p class="font-semibold text-bgray text-l ">Start: </p>
            <p class="font-medium text-xl">{{ \Carbon\Carbon::parse($backup->time)->format('d-M-Y h:i A') }}</p>
        </div>
        <div>
            <p class="font-semibold text-bgray text-l ">Repeat:</p>
            @switch(true)
                @case(str_contains($backup->repeat, 'D'))
                    <p class="font-medium text-xl">Every {{ (int) $backup->repeat }} day</p>
                @break

                @case(str_contains($backup->repeat, 'W'))
                    <p class="font-medium text-xl">Every {{ (int) $backup->repeat }} week</p>
                @break

                @case(str_contains($backup->repeat, 'M'))
                    <p class="font-medium text-xl">Every {{ (int) $backup->repeat }} month</p>
                @break

                @case(str_contains($backup->repeat, 'Y'))
                    <p class="font-medium text-xl">Every {{ (int) $backup->repeat }} year</p>
                @break

                @case(str_contains($backup->repeat, 'h'))
                    <p class="font-medium text-xl">Every {{ (int) $backup->repeat }} hour</p>
                @break

                @case(str_contains($backup->repeat, 'm'))
                    <p class="font-medium text-xl">Every {{ (int) $backup->repeat }} minute</p>
                @break

                @default
            @endswitch
        </div>
        <div>
            <p class="font-semibold text-bgray text-l ">Allowed Run Days:</p>

            <p class="font-medium text-xl">{{ ucwords(implode(', ', $backup->allowedDays)) }}</p>

        </div>
    </div>
@endsection
