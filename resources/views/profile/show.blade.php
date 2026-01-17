@extends('layouts.profile')

@section('content')
<div class="profile-show-wrapper">
    <div class="profile-card">
        <div class="profile-content">
            <div class="profile-left">
                <div class="profile-avatar"></div>
                <div class="profile-buttons">
                    <a href="{{ route('profile.edit') }}" class="btn primary">Edit Profile</a>
                    <a href="{{ route('home') }}" class="btn secondary">Kembali</a>
                </div>
            </div>

            <div class="profile-right">
                <h1 class="profile-title">User Profile</h1>
                <p class="profile-subtitle">User Details:</p>

                <div class="profile-details">
                    <div class="detail-row">
                        <div class="detail-label">Nama</div>
                        <div class="detail-value">{{ $user->name }}</div>
                    </div>

                     <div class="detail-row">
                    <div class="detail-label">Email</div>
                    <div class="detail-value">{{ $user->email }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Password</div>
                    <div class="detail-value">••••••••••••</div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">No. Handphone</div>
                    <div class="detail-value">{{ $user->no_hp ?? '-' }}</div>
                </div>
                    <!-- ... detail lainnya ... -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
