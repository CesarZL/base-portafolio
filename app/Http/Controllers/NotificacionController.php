<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        // Obtener las notificaciones
        $notifiaciones = auth()->user()->unreadNotifications;
        
        // Marcar como leídas
        auth()->user()->unreadNotifications->markAsRead();

        return view('notificaciones.index', [
            'notificaciones' => $notifiaciones,
        ]);
    }
}
