<?php
namespace App\Controller;

use function Symfony\Component\String\u;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VinylController extends AbstractController {

    #[Route('/')]
    public function homepage(): Response {

        $tracks = [
            ['Artist' => 'Ramora', 'Titre' => 'President'],
            ['Artist' => 'Mijah ', 'Titre' => ' mifoka miafina'],
            ['Artist' => 'Bot ', 'Titre' => ' Rapiera'],
            ['Artist' => 'Bolo pix ', 'Titre' => 'On my way'],
        ];
        return $this->render('pages/homepage.html.twig',[
            'Title' => 'PB & Jams',
            'tracks' => $tracks,
        ]);
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