@extends('layouts.layout')

@section('content')
    <div>
        <div class="text-bblue text-3xl mx-5 my-3 font-normal ">Backups</div>
        <a href="/backups/create" class=" bg-bblue text-white mx-5 my-3 p-3 rounded-md w-auto inline-block">Create Backup</a>
        <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3">
            @foreach ($backups as $backup)
                <div class="flex gap-4">
                    <p>{{ $backup->name }}</p>
                    <p>{{ $backup->token }}</p>
                    <p>{{ $backup->client_id }}</p>
                    <p>{{ $backup->description }}</p>
                    <p>{{ $backup->encryption }}</p>
                    <p>{{ $backup->time }}</p>
                    <p>{{ $backup->repeat }}</p>
                    @foreach ($backup->allowdDays as $day)
                        <p>{{ $day }}</p>
                    @endforeach
                    <a href="/backups/{{ $backup->id }}">Generate</a>
                    <form action="/backups/{{ $backup->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="text-bred">
                    </form>

                </div>
            @endforeach
        </div>
    </div>
@endsection
