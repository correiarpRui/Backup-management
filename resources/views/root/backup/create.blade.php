@extends('layouts.root')

@section('content')
    <div
        class="w-[400px] flex flex-col justify-center m-auto mt-10 bg-white p-5 rounded-md shadow-md shadow-gray-400 mb-12 ">
        <div class="text-2xl text-center text-bblue font-medium uppercase mb-4">Create Backup</div>
        <form action="/root/backups" method="POST" class="flex flex-col gap-2">
            @csrf

            <div class="font-semibold text-xl text-bblue mb-0 mt-4">General Settings</div>
            <hr class="border-bblue border-2">

            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="border-2 rounded-md focus:outline-none p-2 mb-2">
            <span class="text-bred">{{ $errors->first('name') }}</span>


            <label for="client">Client</label>
            <select name="client" id="client" class="border-2 rounded-md focus:outline-none p-2 mb-2">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
            <span class="text-bred">{{ $errors->first('client') }}</span>

            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="5"
                class="border-2 rounded-md focus:outline-none p-2 mb-2 resize-none">
            </textarea>
            <span class="text-bred">{{ $errors->first('description') }}</span>

            <label for="contact">Encryption</label>
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
                <input type="time" value="13:00" name="time" class="border-2 rounded-md focus:outline-none p-2 mb-2">
                <input type="date" value="{{ $date }}" name="date"
                    class="border-2 rounded-md focus:outline-none p-2 mb-2 align-middle">
            </div>
            <span class="text-bred">{{ $errors->first('time') }} {{ $errors->first('date') }}</span>

            <label for="repeatRun">Run again every</label>
            <div class="flex gap-4">
                <input type="number" name="repeat" id="repeat" value="1"
                    class="border-2 p-2 rounded-md focus:outline-none">
                <select name="units" id="units" class="border-2 p-2 rounded-md focus:outline-none">
                    <option value="m">Minutes</option>
                    <option value="h">Hours</option>
                    <option value="D" selected>Days</option>
                    <option value="W">Weeks</option>
                    <option value="M">Months</option>
                    <option value="Y">Years</option>
                </select>
            </div>
            <span class="text-bred">{{ $errors->first('repeat') }}</span>


            <label for="days">Allowed days</label>
            <div class="flex gap-2">
                <input type="checkbox" value="mon" name="allowedDays[]" id="monday" checked>
                <label for="mon">Mon</label>
            </div>
            <div class="flex gap-2">
                <input type="checkbox" value="tue" name="allowedDays[]" id="tuesday" checked>
                <label for="tue">Tue</label>
            </div>
            <div class="flex gap-2">
                <input type="checkbox" value="wen" name="allowedDays[]" id="wednesday" checked>
                <label for="wed">Wed</label>
            </div>
            <div class="flex gap-2">
                <input type="checkbox" value="thu" name="allowedDays[]" id="thursday" checked>
                <label for="thu">Thu</label>
            </div>
            <div class="flex gap-2">
                <input type="checkbox" value="fri" name="allowedDays[]" id="friday" checked>
                <label for="fri">Fri</label>
            </div>
            <div class="flex gap-2">
                <input type="checkbox" value="sat" name="allowedDays[]" id="saturday" checked>
                <label for="sat">Sat</label>
            </div>
            <div class="flex gap-2">
                <input type="checkbox" value="sun" name="allowedDays[]" id="sunday" checked>
                <label for="sun">Sun</label>
            </div>
            <span class="text-bred">{{ $errors->first('allowedDays') }}</span>

            <input type="submit" value="Generate Backup"
                class="block text-white bg-bblue w-fit m-auto py-2 px-4 rounded-md uppercase mt-5 focus:outline-none">
        </form>
    </div>
@endsection
