<?php

namespace App\Controller;

use App\Service\Parser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'test')]
    public function index(Parser $parser): Response
    {
        $res = $parser->parseXls( "test2");
        dd($res);

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
