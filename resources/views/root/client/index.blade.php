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
                    <td class="p-2">
                        <div class="flex items-center ">
                            <p class="mr-1">Name</p>
                            <a
                                href="{{ route('root.clients', ['sort' => $sort === 'asc' ? 'desc' : 'asc', 'field' => 'name']) }}">
                                @if ($field != 'name')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="0.63em" height="0.8em"
                                        viewBox="0 0 320 512">
                                        <path fill="currentColor"
                                            d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9S301 224.1 288 224.1L32 224c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9S19.1 288 32.1 288h256c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z" />
                                    </svg>
                                @elseif ($sort === 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="0.63em" height="0.8em"
                                        viewBox="0 0 320 512">
                                        <path fill="currentColor"
                                            d="M182.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-9.2 9.2-11.9 22.9-6.9 34.9S19 224.1 32 224.1h256c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-128-128z" />
                                    </svg>
                                @elseif ($sort === 'desc')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="0.63em" height="0.8em"
                                        viewBox="0 0 320 512">
                                        <path fill="currentColor"
                                            d="M182.6 470.6c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9S19 287.9 32 287.9h256c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128z" />
                                    </svg>
                                @endif
                            </a>
                        </div>
                    </td>
                    <td class="p-2">
                        <div class="flex items-center ">
                            <p class="mr-1">Address</p>
                            <a
                                href="{{ route('root.clients', ['sort' => $sort === 'asc' ? 'desc' : 'asc', 'field' => 'address']) }}">
                                @if ($field != 'address')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="0.63em" height="0.8em"
                                        viewBox="0 0 320 512">
                                        <path fill="currentColor"
                                            d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9S301 224.1 288 224.1L32 224c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9S19.1 288 32.1 288h256c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z" />
                                    </svg>
                                @elseif ($sort === 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="0.63em" height="0.8em"
                                        viewBox="0 0 320 512">
                                        <path fill="currentColor"
                                            d="M182.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-9.2 9.2-11.9 22.9-6.9 34.9S19 224.1 32 224.1h256c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-128-128z" />
                                    </svg>
                                @elseif ($sort === 'desc')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="0.63em" height="0.8em"
                                        viewBox="0 0 320 512">
                                        <path fill="currentColor"
                                            d="M182.6 470.6c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9S19 287.9 32 287.9h256c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128z" />
                                    </svg>
                                @endif
                            </a>
                        </div>
                    </td>
                    <td class="p-2">
                        <div class="flex items-center ">
                            <p class="mr-1">Contact</p>
                            <a
                                href="{{ route('root.clients', ['sort' => $sort === 'asc' ? 'desc' : 'asc', 'field' => 'contact']) }}">
                                @if ($field != 'contact')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="0.63em" height="0.8em"
                                        viewBox="0 0 320 512">
                                        <path fill="currentColor"
                                            d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9S301 224.1 288 224.1L32 224c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9S19.1 288 32.1 288h256c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z" />
                                    </svg>
                                @elseif ($sort === 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="0.63em" height="0.8em"
                                        viewBox="0 0 320 512">
                                        <path fill="currentColor"
                                            d="M182.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-9.2 9.2-11.9 22.9-6.9 34.9S19 224.1 32 224.1h256c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-128-128z" />
                                    </svg>
                                @elseif ($sort === 'desc')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="0.63em" height="0.8em"
                                        viewBox="0 0 320 512">
                                        <path fill="currentColor"
                                            d="M182.6 470.6c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9S19 287.9 32 287.9h256c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128z" />
                                    </svg>
                                @endif
                            </a>
                        </div>
                    </td>
                    <td class="p-2">
                        <div class="flex items-center ">
                            <p class="mr-1">Email</p>
                            <a
                                href="{{ route('root.clients', ['sort' => $sort === 'asc' ? 'desc' : 'asc', 'field' => 'email']) }}">
                                @if ($field != 'email')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="0.63em" height="0.8em"
                                        viewBox="0 0 320 512">
                                        <path fill="currentColor"
                                            d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9S301 224.1 288 224.1L32 224c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9S19.1 288 32.1 288h256c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z" />
                                    </svg>
                                @elseif ($sort === 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="0.63em" height="0.8em"
                                        viewBox="0 0 320 512">
                                        <path fill="currentColor"
                                            d="M182.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-9.2 9.2-11.9 22.9-6.9 34.9S19 224.1 32 224.1h256c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-128-128z" />
                                    </svg>
                                @elseif ($sort === 'desc')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="0.63em" height="0.8em"
                                        viewBox="0 0 320 512">
                                        <path fill="currentColor"
                                            d="M182.6 470.6c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9S19 287.9 32 287.9h256c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128z" />
                                    </svg>
                                @endif
                            </a>
                        </div>
                    </td>
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
