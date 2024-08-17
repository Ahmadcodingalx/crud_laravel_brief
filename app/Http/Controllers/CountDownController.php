<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CountDownController extends Controller
{
    public function startCountdown()
    {
        // Définir la durée du compte à rebours en secondes (60 secondes)
        $countdownDuration = 60;
        $endTime = time() + $countdownDuration;

        // Stocker l'heure de fin dans la session
        Session::put('countdown_end', $endTime);

        return redirect()->route('countdown');
    }

    public function countdown()
    {
        // Récupérer l'heure de fin depuis la session
        $endTime = Session::get('countdown_end');
        if (!$endTime) {
            // Si l'heure de fin n'est pas définie, utilisez le temps actuel
            $endTime = time();
        }

        // Calculer l'heure actuelle et le temps restant
        $currentTime = time();
        $timeRemaining = max($endTime - $currentTime, 0); // Éviter les valeurs négatives

        // Convertir le temps restant en heures, minutes et secondes
        $hours = floor($timeRemaining / 3600);
        $minutes = floor(($timeRemaining % 3600) / 60);
        $seconds = $timeRemaining % 60;

        // Retourner les données en JSON
        return response()->json([
            'hours' => $hours,
            'minutes' => $minutes,
            'seconds' => $seconds,
        ]);
    }
}
