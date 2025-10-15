<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThemeController extends AbstractController
{
    #[Route('/toggle-theme', name: 'app_toggle_theme')]
    public function toggleTheme(): Response
    {
        // Vérifie si un cookie existe déjà
        $response = new Response();
        $currentTheme = $_COOKIE['myapp_dark_mode'] ?? 'false';

        // Alterne entre true et false
        $newTheme = ($currentTheme === 'true') ? 'false' : 'true';

        // Crée un cookie pour 7 jours (604800 secondes)
        $cookie = Cookie::create('myapp_dark_mode', $newTheme, time() + 604800)
            ->withSecure(true)       // Seulement en HTTPS
            ->withHttpOnly(true)      // Inaccessible en JS (sécurité XSS)
            ->withSameSite('Strict'); // Protection CSRF

        $response->headers->setCookie($cookie);

        // Message simple à l’écran
        $response->setContent(sprintf('Mode %s activé (cookie mis à jour).', $newTheme === 'true' ? 'sombre' : 'clair'));
        return $response;
    }
}
