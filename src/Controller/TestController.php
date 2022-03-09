<?php

namespace App\Controller;

use App\Entity\ReportData;
use App\Form\ReportDataType;
use App\Service\Parser;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/parse', name: 'parse')]
    public function parse(Parser $parser): Response
    {
        $res = $parser->parseXls('test');
        dd($res);

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    #[Route('/upload', name: 'upload')]
    public function upload(Request $request, EntityManagerInterface $em): Response
    {
        $reportData = new ReportData();
        $form = $this->createForm(ReportDataType::class, $reportData);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($reportData);
            $em->flush();
            //dd($reportData);

            //return $this->redirectToRoute('index');
        }

        return $this->render('test/upload.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/upload-post', name: 'upload_post')]
    public function uploadPost(Request $request)
    {
        $filename = $request->request->get('report');
        dd($request);
        $file = $request->files->get('report');

        dd($filename, $file);
    }

    #[Route('/', name: 'index')]
    public function index(EntityManagerInterface $entityManager)
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
