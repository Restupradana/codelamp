@php
    $layout = match (Auth::user()->role) {
        'admin' => 'layouts.admin',
        'instruktur' => 'layouts.instruktur',
        default => 'layouts.sidebar',
    };
@endphp

@extends($layout)

@section('title', 'Pesan')

@section('content')
    <div class="messenger">
        @include('Chatify::layouts.headLinks')
        @include('Chatify::layouts.messenger')
    </div>
@endsection
