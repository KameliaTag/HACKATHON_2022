<?php

namespace App\Controller;

use App\Entity\ReportData;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReportController extends AbstractController
{
    #[Route('/report', name: 'report')]
    public function index(): Response
    {
        return $this->render('report/index.html.twig', [
            'controller_name' => 'ReportController',
        ]);
    }

    #[Route('/report/generate', name: 'report_generation')]
    public function generate() : Response {



        return $this->render('report/create.html.twig', [
        ]);
    }

    #[Route('/report/create', name: 'report_create')]
    public function create(Request $request, EntityManagerInterface $em) : Response {


        $reportData = (new ReportData())
                ->setReport($request->request->get('report')->getClientOriginalName())
                ->setReportFile($request->files->get('report'))
        ;
        

        $em->persist($reportData);
        $em->flush();

        return $this->render('report/create.html.twig', [
        ]);
    }

}
