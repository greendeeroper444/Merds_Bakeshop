@extends('layouts.profile')
@section('title', 'Personal Profile')

@section('content')
<main class="main-container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="/home" title="Home">Home</a></li>
            <span class="slash">/</span>
            <li class="item-link"><span>Personal Profile</span></li>
        </ul>
    </div>
    <section id="profile">
    <h2>Profile</h2>
        <div class="profile-details">
            <img src="{{ asset('assets/img/avatars/avatar_' . auth()->id() . '.' . (file_exists(public_path('assets/img/avatars/avatar_' . auth()->id() . '.png')) ? 'png' : 'jpg')) }}" alt="{{ auth()->user()->name }} Avatar">
            <div class="user-info">
            <h3>{{ old('name', $user->name) }}</h3>
            <p><strong>Email:</strong> {{ old('name', $user->email) }}</p>
            <p><strong>Phone:</strong> {{ old('name', $user->phone_number) }}</p>
            <p><strong>Address:</strong> {{ old('name', $user->address) }}</p>
            <button id="change-avatar-btn" onclick="toggleFormContainer()">Change Profile</button>
            @if (session('status') === 'profile-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="form-status-message form-status-message-success"
            >Your profile information has been changed.</p>
            @endif
        </div>
        </div>
        <div class="bio-section">
            <h4>Bio</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce non tortor auctor, iaculis tortor ut, consectetur urna. Vestibulum et ante metus. Nulla facilisi. Phasellus id risus et neque ultrices fringilla eu vel nunc.</p>
        </div>
    </section>
    <div class="form-container" style="display: none;">
        <div class="max-width">
            <div class="form-section">
                <div class="form-section-header">
                <h3>Update Profile Information</h3>
                </div>
                <div class="form-section-content">
                @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="form-section">
                <div class="form-section-header">
                <h3>Update Password</h3>
                </div>
                <div class="form-section-content">
                @include('profile.partials.update-password-form')
                </div>
            </div>
            <div class="form-section">
                <div class="form-section-header">
                <h3>Delete User</h3>
                </div>
                <div class="form-section-content">
                @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
