<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApprovalController extends Controller
{
    private $tenantId;
    private $clientId;
    private $clientSecret;
    private $teamId;
    private $channelId;

    public function __construct()
    {
        $this->tenantId = env('MICROSOFT_TENANT_ID');
        $this->clientId = env('MICROSOFT_CLIENT_ID');
        $this->clientSecret = env('MICROSOFT_CLIENT_SECRET');
        $this->teamId = env('TEAM_ID');
        $this->channelId = env('CHANNEL_ID');
    }

    private function obtenerToken()
    {
        $response = Http::asForm()->post("https://login.microsoftonline.com/{$this->tenantId}/oauth2/v2.0/token", [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'scope' => 'https://graph.microsoft.com/.default',
            'grant_type' => 'client_credentials',
        ]);

        if ($response->failed()) {
            Log::error('Error al obtener el token: ' . $response->body());
            return null;
        }

        return $response->json()['access_token'] ?? null;
    }

    public function enviarAprobacion(Request $request)
    {
        $token = $this->obtenerToken();
        if (!$token) {
            return response()->json(['error' => 'No se pudo obtener el token de autenticación'], 401);
        }

        // Validar datos de entrada
        $request->validate([
            'nombre' => 'required|string',
            'cedula' => 'required|string',
            'cargo' => 'required|string',
            'email_aprobador' => 'required|email',
            'email_solicitante' => 'required|email',
        ]);

        // Datos de la solicitud
        $datos = [
            "resource" => "/teams/{$this->teamId}/channels/{$this->channelId}/approvals",
            "title" => "Nueva Solicitud de Aprobación",
            "description" => "Se ha enviado una solicitud de aprobación.",
            "requestType" => "generic",
            "requestor" => [
                "email" => $request->email_solicitante
            ],
            "approvalItems" => [
                [
                    "id" => "1",
                    "title" => "Datos del Usuario",
                    "description" => "Nombre: {$request->nombre}, Cédula: {$request->cedula}, Cargo: {$request->cargo}"
                ]
            ],
            "approvers" => [
                [
                    "email" => $request->email_aprobador
                ]
            ]
        ];

        // Enviar la solicitud a Microsoft Graph API
        $response = Http::withToken($token)->post("https://graph.microsoft.com/beta/teams/{$this->teamId}/channels/{$this->channelId}/approvals", $datos);

        if ($response->successful()) {
            return response()->json(['message' => 'Solicitud enviada correctamente']);
        }

        return response()->json([
            'error' => 'Error al enviar la solicitud',
            'status' => $response->status(),
            'details' => $response->json()
        ], 500);
    }
}


