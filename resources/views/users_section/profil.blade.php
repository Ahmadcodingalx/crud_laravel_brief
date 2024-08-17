@extends('layouts.base')

@section('content')
    @include('includes.slidebar')

    <div class="wrap-content">
        @include('includes.appbar')

        <br /><br /><br />

        @php
            $user = Auth::user();
        @endphp

        <div class="container">
            <div class="border datatable-cover">
                <h1>Profil de {{ $user->name }}</h1>
            </div>
        </div>
    </div>
@endsection