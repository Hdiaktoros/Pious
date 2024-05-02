<?php
@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <p>Welcome, {{ $user->name }}!</p>
        <p>This is your dashboard. You can customize this page based on user roles and permissions.</p>
    </div>
@endsection

