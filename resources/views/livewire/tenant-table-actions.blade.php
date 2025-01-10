@php
    $token = tenancy()->impersonate($tenant, $tenant->id, '/dashboard');
    $domain = $tenant->domains->first()->domain;
    $url = "http://$domain/impersonate/{$token->token}";
@endphp
@foreach ($tenant->domains as $domain)
    <a href="http://{{ $domain->domain }}/login?email={{ $tenant->email }}&password={{ 'password' }}" target="_blank">
        {{ $domain->domain }}{{ $loop->last ? '' : ', ' }}
    </a>

    {{-- Impersonate here --}}
    {{-- <a href="{{ $url }}" class="text-blue-500 inline-flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10 3a1 1 0 00-1 1v4H5a1 1 0 000 2h4v4a1 1 0 002 0v-4h4a1 1 0 000-2h-4V4a1 1 0 00-1-1z" />
        </svg>
        Impersonate
    </a> --}}
@endforeach
