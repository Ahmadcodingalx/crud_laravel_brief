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
                <h2>Bienvenue {{ $user->name }} sur votre page d'acceuil, vous êtes un simple utilisateur</h2>
            </div>
        </div>
    </div>
@endsection