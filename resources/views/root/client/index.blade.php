@extends('layouts.root')

@section('content')
    <div class="flex justify-between m-5 items-center">
        <p class="text-bblue text-3xl mx-5 font-normal">Clients</p>
        <a href="{{ route('root.clients.create') }}" class=" bg-bblue text-white mx-5 p-3 rounded-md w-auto inline-block">Add
            Client</a>
    </div>

    <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3 flex gap-2 flex-col">
        <table class="border-collapse m-4">
            <thead>
                <tr class="font-semibold text-bblue border-b-2 border-bblue">
                    <td class="p-2">Name</td>
                    <td class="p-2">Address</td>
                    <td class="p-2">Contact</td>
                    <td class="p-2">Email</td>
                    <td class="p-2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr class="even:bg-blgray">
                        <td class="p-2">{{ $client->name }}</td>
                        <td class="p-2">{{ $client->address }}</td>
                        <td class="p-2">{{ $client->contact }}</td>
                        <td class="p-2">{{ $client->email }}</td>
                        <td class="p-2">
                            <div class="flex gap-2">
                                <a href="{{ route('root.clients.show', $client->id) }}">View</a>
                                <a href="{{ route('root.clients.update', $client->id) }}">Edit</a>
                                <form action="{{ route('root.clients.destroy', $client->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="text-bred">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
