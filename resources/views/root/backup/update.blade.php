@extends('layouts.root')

@section('content')
    <div
        class="w-[400px] flex flex-col justify-center m-auto mt-10 bg-white p-5 rounded-md shadow-md shadow-gray-400 mb-12 ">
        <div class="text-2xl text-center text-bblue font-medium uppercase mb-4">Edit Backup</div>
        <form action="{{ route('root.backups.patch', $backup->id) }}" method="POST" class="flex flex-col gap-2">
            @csrf
            @method('PATCH')
            <div class="font-semibold text-xl text-bblue mb-0 mt-4">General Settings</div>
            <hr class="border-bblue border-2">

            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ $backup->name }}"
                class="border-2 rounded-md focus:outline-none p-2 mb-2">
            <span class="text-bred">{{ $errors->first('name') }}</span>


            <label for="client">Client</label>
            <select name="client" id="client" class="border-2 rounded-md focus:outline-none p-2 mb-2">
                @foreach ($clients as $client)
                    @if ($backup->client_id == $client->id)
                        <option value="{{ $client->id }}" @selected(true)>{{ $client->name }}</option>
                    @else
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endif
                @endforeach
            </select>
            <span class="text-bred">{{ $errors->first('client') }}</span>

            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="5"
                class="border-2 rounded-md focus:outline-none p-2 mb-2 resize-none">{{ $backup->description }}</textarea>
            <span class="text-bred">{{ $errors->first('description') }}</span>

            <label for="contact">Encryption</label>
            {{-- add default Encryption --}}
            <select name="encryption" id="encryption" class="border-2 p-2 rounded-md focus:outline-none">
                <option value="aes">AES-255</option>
            </select>
            <span class="text-bred">{{ $errors->first('encryption') }}</span>

            <label for="passphrase">Passphrase</label>
            <input type="password" name="passphrase" id="passphrase"
                class="border-2 rounded-md focus:outline-none p-2 mb-2">
            <span class="text-bred">{{ $errors->first('passphrase') }}</span>

            <label for="passphrase_confirmation">Repeat Passphrase</label>
            <input type="password" name="passphrase_confirmation" id="passphrase_confirmation"
                class="border-2 rounded-md focus:outline-none p-2 mb-2">
            <span class="text-bred">{{ $errors->first('passphrase_confirmation') }}</span>

            <div class="font-semibold text-xl text-bblue mb-0 mt-4">Schedule</div>
            <hr class="border-bblue border-2">

            <label for="nextRun">Next time</label>
            <div class="flex gap-4">
                <input type="time" value="{{ \Carbon\Carbon::parse($backup->time)->format('h:i') }}" name="time"
                    class="border-2 rounded-md focus:outline-none p-2 mb-2">
                <input type="date" value="{{ $date }}" name="date"
                    class="border-2 rounded-md focus:outline-none p-2 mb-2 align-middle">
            </div>
            <span class="text-bred">{{ $errors->first('time') }} {{ $errors->first('date') }}</span>

            <label for="repeatRun">Run again every</label>
            <div class="flex gap-4">
                <input type="number" name="repeat" id="repeat" value="{{ (int) $backup->repeat }}"
                    class="border-2 p-2 rounded-md focus:outline-none">
                <select name="units" id="units" class="border-2 p-2 rounded-md focus:outline-none">
                    <option value="m" @selected(str_contains($backup->repeat, 'm'))>Minutes</option>
                    <option value="h" @selected(str_contains($backup->repeat, 'h'))>Hours</option>
                    <option value="D" @selected(str_contains($backup->repeat, 'D'))>Days</option>
                    <option value="W" @selected(str_contains($backup->repeat, 'W'))>Weeks</option>
                    <option value="M" @selected(str_contains($backup->repeat, 'M'))>Months</option>
                    <option value="Y" @selected(str_contains($backup->repeat, 'Y'))>Years</option>
                </select>
            </div>
            <span class="text-bred">{{ $errors->first('repeat') }}</span>


            <label for="days">Allowed days</label>
            <div class="flex gap-2">
                <input type="checkbox" value="mon" name="allowedDays[]" id="monday" @checked(in_array('mon', $backup->allowedDays))>
                <label for="monday">Mon</label>
            </div>
            <div class="flex gap-2">
                <input type="checkbox" value="tue" name="allowedDays[]" id="tuesday" @checked(in_array('tue', $backup->allowedDays))>
                <label for="tuesday">Tue</label>
            </div>
            <div class="flex gap-2">
                <input type="checkbox" value="wed" name="allowedDays[]" id="wednesday" @checked(in_array('wed', $backup->allowedDays))>
                <label for="wednesday">Wed</label>
            </div>
            <div class="flex gap-2">
                <input type="checkbox" value="thu" name="allowedDays[]" id="thursday" @checked(in_array('thu', $backup->allowedDays))>
                <label for="thursday">Thu</label>
            </div>
            <div class="flex gap-2">
                <input type="checkbox" value="fri" name="allowedDays[]" id="friday" @checked(in_array('fri', $backup->allowedDays))>
                <label for="friday">Fri</label>
            </div>
            <div class="flex gap-2">
                <input type="checkbox" value="sat" name="allowedDays[]" id="saturday" @checked(in_array('sat', $backup->allowedDays))>
                <label for="saturday">Sat</label>
            </div>
            <div class="flex gap-2">
                <input type="checkbox" value="sun" name="allowedDays[]" id="sunday" @checked(in_array('sun', $backup->allowedDays))>
                <label for="sunday">Sun</label>
            </div>
            <span class="text-bred">{{ $errors->first('allowedDays') }}</span>
            <button
                class="block text-white bg-bblue w-fit m-auto py-2 px-4 rounded-md uppercase mt-5 focus:outline-none">Update
                Backup</button>
        </form>
    </div>
@endsection
