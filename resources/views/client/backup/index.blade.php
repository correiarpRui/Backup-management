@extends('layouts.client')

@section('content')
    <div>
        <div class="text-bblue text-3xl mx-5 my-3 font-normal ">Backups</div>
        <a href="/admin/backups/create" class=" bg-bblue text-white mx-5 my-3 p-3 rounded-md w-auto inline-block">Create
            Backup</a>
        <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3">
            @foreach ($backups as $backup)
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
            @endforeach
        </div>
    </div>
@endsection
