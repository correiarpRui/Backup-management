@extends('layouts.root')

@section('content')
    <div class="flex justify-between m-5 items-center">
        <p class="text-bblue text-3xl mx-5 font-normal">Backups</p>
        <a href="{{ route('root.backups.create') }}" class=" bg-bblue text-white mx-5 p-3 rounded-md w-auto inline-block">Add
            Backup</a>
    </div>


    <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3">
        @foreach ($backups as $backup)
            <div class="flex gap-4">
                <p>{{ $backup->name }}</p>
                <p>{{ $backup->createdBy->name }}</p>
                <p>{{ $backup->token }}</p>
                <p>{{ $backup->client_id }}</p>
                <p>{{ $backup->description }}</p>
                <p>{{ $backup->encryption }}</p>
                <p>{{ $backup->time }}</p>
                <p>{{ $backup->repeat }}</p>
                @foreach ($backup->allowedDays as $day)
                    <p>{{ $day }}</p>
                @endforeach
                <a class="text-bblue font-semibold" href="/root/backups/download/{{ $backup->id }}">Download</a>
                <form action="/root/backups/{{ $backup->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="text-bred font-semibold">
                </form>

            </div>
        @endforeach
    </div>
@endsection
