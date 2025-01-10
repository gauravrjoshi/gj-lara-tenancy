<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenants') }}
            <x-btn-link class="ml-4 float-right" href="{{ route('tenants.create') }}">Add Tenant</x-btn-link>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Domain
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tenants as $tenant)
                                    <tr class="bg-white border-b">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $loop->iteration }}
                                        </th>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap
                                        Apple MacBook Pro 17">{{ $tenant->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $tenant->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{-- {{ dd($tenants) }} --}}

                                            {{-- @foreach ($tenants as $tenant)
                                                <a href="{{ url('/impersonate/' . $tenant->id) }}">
                                                    {{ $tenant->domain_name }}
                                                </a>
                                            @endforeach --}}
                                            @foreach ($tenant->domains as $domain)
                                                <a href="http://{{ $domain->domain }}/login?email={{ $tenant->email }}&password={{ 'password' }}" target="_blank">
                                                    {{ $domain->domain }}{{ $loop->last ? '' : ', ' }}
                                                </a>
                                            @endforeach
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
</x-app-layout>
