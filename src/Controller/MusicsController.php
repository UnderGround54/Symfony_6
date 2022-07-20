<?php
namespace App\Controller;

use function Symfony\Component\String\u;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MusicsController extends AbstractController {

    public $tracks = [
        ['Artist' => 'Ramora', 'Titre' => 'President', 'Genre' => 'Pop'],
        ['Artist' => 'Mijah ', 'Titre' => ' mifoka miafina', 'Genre' => 'Rock'],
        ['Artist' => 'DA 7', 'Titre' => ' Rapiera', 'Genre' => 'Slow'],
        ['Artist' => 'Bolo pix ', 'Titre' => 'On my way', 'Genre' => 'K-POP'],
    ];

    #[Route('/', name: 'home')]
    public function homepage(): Response {
        // dump($tracks);
        return $this->render('pages/homepage.html.twig',[
            'Title' => 'Hira Malagasy',
            'tracks' => $this->tracks,
        ]);
    }

    #[Route('/browse/{recherche}', name: 'browse')]
    public function browse(String $recherche = null): Response 
    {
        
        $genre = $recherche ? u(str_replace('_',' ', $recherche))->title(true) : null;
       
        return $this->render('pages/browse.html.twig',[
            'genre' => $genre,
            'tracks' => $this->tracks,
        ]);
    }

}