<?php
namespace App\Controller;

use function Symfony\Component\String\u;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VinylController {

    #[Route('/')]
    public function homepage(): Response {
        return new Response('Author: Bob Marley');
    }

    #[Route('/browse/{slug}')]
    public function browse(String $slug = null): Response 
    {

        if ($slug) {
            $title = 'Title: Never Give Up Geek '.u(str_replace('_',' ', $slug))->title(true);
        }else{
            $title = 'All Genres';
        }
        return new Response( $title );
    }

}