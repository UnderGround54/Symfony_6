<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MusicsApiController extends AbstractController{

    #[Route('/api/musics/{id<\d+>}', methods: ['GET'], name: 'api_musics')]
    public function getMusics(int $id, LoggerInterface $logger): Response {
        $musics = [
            'id' => $id,
            'name' => 'Music Slow',
            'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3'
        ];

        $logger->info('API music id : {musics}', [ 
            'musics' => $id,
        ]);
        // return new JsonResponse($musics);
        return $this->json($musics);
    }


}