@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Profil Saya</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <p><strong>Nomor HP:</strong> {{ $profile->phone ?? '-' }}</p>
        <p><strong>Alamat:</strong> {{ $profile->address ?? '-' }}</p>

        @if($profile && $profile->photo)
            <p><strong>Foto:</strong></p>
            <img src="{{ asset('storage/' . $profile->photo) }}" alt="Foto Profil" width="120">
        @endif

        <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">Edit Profil</a>
    </div>
@endsection
