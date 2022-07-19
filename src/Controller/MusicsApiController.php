<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MusicsApiController extends AbstractController{

    #[Route('/api/musics/{id}')]
    public function getMusics($id): Response {
        $musics = [
            'id' => $id,
            'name' => 'Music Slow',
            'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3'
        ];
        // return new JsonResponse($musics);
        return $this->json($musics);
    }


}