@extends('layouts.base')

@section('content')
    @include('includes.slidebar')

    <div class="wrap-content">
        @include('includes.appbar')

        <br /><br /><br /><br /><br />

        @php
            $user = Auth::user();
        @endphp

        <div class="container">
            <div class="border datatable-cover">
                <h3>Bienvenue <span class="user-name">{{ $user->name }}</span> sur votre page d'acceuil, vous êtes un simple utilisateur</h3>
            </div>
        </div>
    </div>
@endsection