@extends('layouts.client')

@section('navLinks')
    <a href="{{ route('client.clients.show', $client->id) }}" class="uppercase font-semibold">{{ $client->name }}</a>
    <a href="{{ route('client.backups', $client->id) }}" class="uppercase font-semibold">Backups</a>
    <a href="/client/events" class="uppercase font-semibold">Events</a>
@endsection

@section('content')
    <div class="flex justify-between m-5 items-center">
        <p class="text-bblue text-3xl mx-5 font-normal">Backup Details</p>
        <div class="flex gap-3">
            <a href="{{ route('client.backups.download', $backup->id) }}"
                class=" bg-bblue text-white  p-3 rounded-md w-auto inline-block">Download</a>
            <a href="{{ route('root.backups.update', $backup->id) }}"
                class=" bg-bblue text-white  p-3 rounded-md w-auto inline-block">Edit</a>
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
            <p class="font-semibold text-bgray text-l ">Bucket Token:</p>
            <p class="font-medium text-xl">{{ $backup->token }}</p>
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

    <div class="text-bblue text-3xl mx-5 font-normal px-5 py-3  ">Schedule</div>
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
    <div class="text-bblue text-3xl mx-5 font-normal px-5 py-3  ">Events</div>
    <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3 mb-10 flex gap-2 flex-col">
        <table class="border-collapse m-4">
            <thead>
                <tr class="font-semibold text-bblue border-b-2 border-bblue">
                    <td class="p-2">
                        <div class="flex items-center ">
                            <p class="mr-1">Backup Name</p>
                            <a
                                href="{{ route('root.backups.show', ['id' => $backup->id, 'sort' => $sort === 'asc' ? 'desc' : 'asc', 'field' => 'name']) }}">
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
                            <p class="mr-1">Operation</p>
                            <a
                                href="{{ route('root.backups.show', ['id' => $backup->id, 'sort' => $sort === 'asc' ? 'desc' : 'asc', 'field' => 'operation_name']) }}">
                                @if ($field != 'operation_name')
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
                            <p class="mr-1">Start</p>
                            <a
                                href="{{ route('root.backups.show', ['id' => $backup->id, 'sort' => $sort === 'asc' ? 'desc' : 'asc', 'field' => 'begin_time']) }}">
                                @if ($field != 'begin_time')
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
                            <p class="mr-1">End</p>
                            <a
                                href="{{ route('root.backups.show', ['id' => $backup->id, 'sort' => $sort === 'asc' ? 'desc' : 'asc', 'field' => 'end_time']) }}">
                                @if ($field != 'end_time')
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
                            <p class="mr-1">Duration</p>
                            <a
                                href="{{ route('root.backups.show', ['id' => $backup->id, 'sort' => $sort === 'asc' ? 'desc' : 'asc', 'field' => 'duration']) }}">
                                @if ($field != 'duration')
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
                            <p class="mr-1">Warnings</p>
                            <a
                                href="{{ route('root.backups.show', ['id' => $backup->id, 'sort' => $sort === 'asc' ? 'desc' : 'asc', 'field' => 'warnings']) }}">
                                @if ($field != 'warnings')
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
                            <p class="mr-1">Errors</p>
                            <a
                                href="{{ route('root.backups.show', ['id' => $backup->id, 'sort' => $sort === 'asc' ? 'desc' : 'asc', 'field' => 'errors']) }}">
                                @if ($field != 'errors')
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
                </tr>
            </thead>
            <tbody>
                @foreach ($backup->reports as $event)
                    <tr class="even:bg-blgray">
                        <td class="p-2">{{ $event->name }}</td>
                        <td class="p-2">{{ $event->operation_name }}</td>
                        <td class="p-2">{{ \Carbon\Carbon::parse($event->begin_time)->format('d-m-Y') }}</td>
                        <td class="p-2">{{ \Carbon\Carbon::parse($event->end_time)->format('d-m-Y') }}</td>
                        <td class="p-2">{{ \Carbon\CarbonInterval::seconds($event->duration)->cascade()->forHumans() }}
                        </td>
                        <td class="p-2">{{ $event->warnings }}</td>
                        <td class="p-2">{{ $event->errors }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
