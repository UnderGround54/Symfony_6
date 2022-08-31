<?php
namespace App\Controller;

use App\Service\MixRepository;
use function Symfony\Component\String\u;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MusicsController extends AbstractController {

    // public $tracks = [
    //     ['Artist' => 'Ramora', 'Titre' => 'President', 'Genre' => 'Pop'],
    //     ['Artist' => 'Mijah ', 'Titre' => ' mifoka miafina', 'Genre' => 'Rock'],
    //     ['Artist' => 'DA 7', 'Titre' => ' Rapiera', 'Genre' => 'Slow'],
    //     ['Artist' => 'Bolo pix ', 'Titre' => 'On my way', 'Genre' => 'K-POP'],
    // ];

    #[Route('/', name: 'home')]
    public function homepage(): Response {
        // dump($tracks);
        return $this->render('pages/homepage.html.twig',[
            'Title' => 'Hira Malagasy',
            'tracks' => $this->getMixes(),
        ]);
    }

    #[Route('/browse/{recherche}', name: 'browse')]
    public function browse(MixRepository $tracks,String $recherche = null): Response 
    {
        $genre = $recherche ? u(str_replace('_',' ', $recherche))->title(true) : null;
        $mixs = $tracks->findAll();
        return $this->render('pages/browse.html.twig',[
            'genre' => $genre,
            'tracks' => $mixs,
        ]);
    }

    private function getMixes(): array
    {
        return [
            ['Artist' => 'Ramora', 'Titre' => 'President', 'Genre' => 'Pop', 'createdAt' => new \DateTime('12-01-2016')],
            ['Artist' => 'Mijah ', 'Titre' => ' mifoka miafina', 'Genre' =>'Rock', 'createdAt' => new \DateTime('02-09-2020')],
            ['Artist' => 'DA 7', 'Titre' => ' Rapiera', 'Genre' =>'Slow', 'createdAt' => new \DateTime('14-12-2021')],
            ['Artist' => 'Bolo pix ', 'Titre' => 'On my way', 'Genre' => 'K-POP', 'createdAt' => new \DateTime('17-03-2020')],
        ];
    }

}