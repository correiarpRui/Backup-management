@extends('layouts.root')

@section('content')
    <div class="flex justify-between m-5 items-center">
        <p class="text-bblue text-3xl mx-5 font-normal">Events</p>
    </div>

    <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3 flex gap-2 flex-col">
        <table class="border-collapse m-4">
            <thead>
                <tr class="font-semibold text-bblue border-b-2 border-bblue">
                    <td class="p-2">
                        <div class="flex items-center ">
                            <p class="mr-1">Backup Name</p>
                            <a
                                href="{{ route('root.events', ['sort' => $sort === 'asc' ? 'desc' : 'asc', 'field' => 'name']) }}">
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
                                href="{{ route('root.events', ['sort' => $sort === 'asc' ? 'desc' : 'asc', 'field' => 'operation_name']) }}">
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
                                href="{{ route('root.events', ['sort' => $sort === 'asc' ? 'desc' : 'asc', 'field' => 'begin_time']) }}">
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
                                href="{{ route('root.events', ['sort' => $sort === 'asc' ? 'desc' : 'asc', 'field' => 'end_time']) }}">
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
                                href="{{ route('root.events', ['sort' => $sort === 'asc' ? 'desc' : 'asc', 'field' => 'duration']) }}">
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
                                href="{{ route('root.events', ['sort' => $sort === 'asc' ? 'desc' : 'asc', 'field' => 'warnings']) }}">
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
                                href="{{ route('root.events', ['sort' => $sort === 'asc' ? 'desc' : 'asc', 'field' => 'errors']) }}">
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
                @foreach ($events as $event)
                    <tr class="even:bg-blgray">
                        <td class="p-2">{{ $event->name }}</td>
                        <td class="p-2">{{ $event->operation_name }}</td>
                        <td class="p-2">{{ \Carbon\Carbon::parse($event->begin_time)->format('d-m-Y h:i A') }}</td>
                        <td class="p-2">{{ \Carbon\Carbon::parse($event->end_time)->format('d-m-Y h:i A') }}</td>
                        <td class="p-2">{{ round(\Carbon\Carbon::parse($event->duration)->secondsSinceMidnight()) }}
                            seconds
                        </td>
                        <td class="p-2">{{ $event->warnings }}</td>
                        <td class="p-2">{{ $event->errors }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
