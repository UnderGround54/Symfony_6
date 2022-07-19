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
        // dump($tracks);
        return $this->render('pages/homepage.html.twig',[
            'Title' => 'PB & Jams',
            'tracks' => $tracks,
        ]);
    }

    #[Route('/browse/{recherche}')]
    public function browse(String $recherche = null): Response 
    {
        $genre = $recherche ? u(str_replace('_',' ', $recherche))->title(true) : null;
        
        return $this->render('pages/browse.html.twig',[
            'genre' => $genre,
        ]);
    }

}