@extends('layouts.root')

@section('content')
    <div class="flex justify-between m-5 items-center">
        <p class="text-bblue text-3xl mx-5 font-normal">Users</p>
        <a href="{{ route('root.users.create') }}" class=" bg-bblue text-white mx-5 p-3 rounded-md w-auto inline-block">Add
            User</a>
    </div>

    <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3 flex gap-2 flex-col">
        <table class="border-collapse m-4">
            <thead>
                <tr class="font-semibold text-bblue border-b-2 border-bblue">
                    <td class="p-2 ">Name
                        <a
                            href="{{ route('root.users', $sort === 'asc' ? ['sort' => 'desc', 'field' => 'name'] : ['sort' => 'asc', 'field' => 'name']) }}">
                            {{ $field === 'name' ? $sort : '-' }}</a>
                    </td>
                    <td class="p-2">Email
                        <a
                            href="{{ route('root.users', $sort === 'asc' ? ['sort' => 'desc', 'field' => 'email'] : ['sort' => 'asc', 'field' => 'email']) }}">
                            {{ $field === 'email' ? $sort : '-' }}</a>
                    </td>

                    <td class="p-2">Role
                        <a
                            href="{{ route('root.users', $sort === 'asc' ? ['sort' => 'desc', 'field' => 'role'] : ['sort' => 'asc', 'field' => 'role']) }}">
                            {{ $field === 'role' ? $sort : '-' }}</a>
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="even:bg-blgray">
                        <td class="p-2">{{ $user->name }}</td>
                        <td class="p-2">{{ $user->email }}</td>
                        <td class="p-2">{{ $user->role }}</td>
                        <td class="p-2">
                            <div class="flex gap-2">
                                <a href="{{ route('root.users.show', $user->id) }}">View</a>
                                <a href="{{ route('root.users.update', $user->id) }}">Edit</a>
                                <form action="{{ route('root.users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="text-bred cursor-pointer">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
