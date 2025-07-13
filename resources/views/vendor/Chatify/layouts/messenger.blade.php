{{-- layouts/messenger.blade.php --}}
@php
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();

    // Default layout fallback
    $layout = 'layouts.app';

    if ($user) {
        switch ($user->role) {
            case 'admin':
                $layout = 'layouts.admin';
                break;
            case 'instruktur':
                $layout = 'layouts.instruktur';
                break;
            case 'siswa':
                $layout = 'layouts.sidebar';
                break;
        }
    }
@endphp

@extends($layout)

@section('content')
    @yield('messenger-content')
@endsection
