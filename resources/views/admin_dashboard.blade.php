@extends('layouts.base')

{{-- <script>
    function updateCountdown() {
        fetch('{{ url('/countdown') }}')
            .then(response => response.json())
            .then(data => {
                document.getElementById('countdown').innerHTML =
                    'Heures: ' + data.hours +
                    ' Minutes: ' + data.minutes +
                    ' Secondes: ' + data.seconds;
            })
            .catch(error => console.error('Erreur:', error));
    }

    // Mettre à jour le compte à rebours toutes les secondes
    setInterval(updateCountdown, 1000);

    // Initialiser le compte à rebours au chargement de la page
    window.onload = updateCountdown;
</script> --}}

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
                <h2>Bienvenue {{ $user->name }} sur votre page d'acceuil, vous êtes administrateur</h2>
            </div>
            
        </div>
        
    </div>
@endsection


<style>
    #countdown {
        font-size: 2em;
        font-family: Arial, sans-serif;
    }
</style>

{{-- <script>
    function fetchCountdown() {
        fetch('/admin_dashboard')
            .then(response => response.json())
            .then(data => {
                document.getElementById('hours').textContent = String(data.hours).padStart(2, '0');
                document.getElementById('minutes').textContent = String(data.minutes).padStart(2, '0');
                document.getElementById('seconds').textContent = String(data.seconds).padStart(2, '0');
            })
            .catch(error => console.error('Erreur:', error));
    }

    setInterval(fetchCountdown, 1000); // Actualiser toutes les secondes
    window.onload = fetchCountdown; // Charger les données au chargement de la page
</script> --}}




{{-- @section('content')


@endsection --}}