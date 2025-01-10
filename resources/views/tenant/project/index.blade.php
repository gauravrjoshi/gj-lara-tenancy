<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
            <x-btn-link class="ml-4 float-right" href="{{ route('users.create') }}">Add User</x-btn-link>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <h1 class="text-xl font-bold mb-4">Projects</h1>
                        <div class="mb-4">
                            <a href="{{ route('projects.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add Project
                            </a>
                        </div>
                        <table class="table-auto w-full mt-4">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Description</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $project->name }}</td>
                                        <td class="border px-4 py-2">{{ $project->description }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('projects.show', $project) }}" class="text-blue-500 hover:underline">View</a>
                                            <a href="{{ route('projects.edit', $project) }}" class="text-green-500 hover:underline ml-2">Edit</a>
                                            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-tenant-app-layout>
