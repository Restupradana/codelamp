{{-- layouts/chatify-wrapper.blade.php --}}
@php
    $user = Auth::user();
    $role = $user->role ?? 'siswa';

    switch ($role) {
        case 'admin':
            $layout = 'layouts.admin';
            break;
        case 'instruktur':
            $layout = 'layouts.instruktur';
            break;
        case 'siswa':
        default:
            $layout = 'layouts.sidebar';
            break;
    }
@endphp

@extends($layout)

@section('content')
    @yield('chatify-content')
@endsection
