<?php

namespace App\Controller;

use App\Entity\ReportData;
use App\Service\Parser;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReportController extends AbstractController
{
    #[Route('/report', name: 'report_generation')]
    public function generate(): Response
    {
        return $this->render('report/create.html.twig', [
        ]);
    }

    #[Route('/report/create', name: 'report_create')]
    public function create(Request $request, EntityManagerInterface $em, Parser $parser): Response
    {

        $upload = $request->files->get('report');

        if (!$upload) {
            throw new \Exception('You must upload a file to create a report');
        }
        $filename = $upload->getClientOriginalName();
        $reportData = (new ReportData())
            ->setReport($filename)
            ->setReportFile($upload);

        $em->persist($reportData);
        $em->flush();

        if (strpos($filename, '.csv') != false) {
            $data = $parser->parseCsv('test');
        } elseif(strpos($filename, '.xlsx') != false) {
            $data = $parser->parseXls('test');
        } else {
            throw new \Exception('You must provide .csv or .xlsx file');
        }

        $reference = 'score_skinbiosense';
        $product = 417432;

        $res = [];
        foreach ($data as $value) {
            if (empty($value['product_code']) || $product != $value['product_code']) {
                continue;
            }

            $res
            [$this->getAlias('product_code', $value['product_code'])]
            [$this->getAlias($reference, $value[$reference])]
            [] = $value['mesure'];
        }

        $formattedRes = [];
        foreach ($res as $keyProduct => $products) {
            foreach ($products as $keyReference => $value) {
                $res[$keyProduct][$keyReference] = count($value) ? round(array_sum($value) / count($value), 2) : 0;
            }

            $formattedRes[] = [
                'title' => $keyProduct,
                'labels' => array_keys($res[$keyProduct]),
                'values' => array_values($res[$keyProduct]),
            ];
        }

        return $this->render('report/create.html.twig', [
            'chart_data' => [
                'type' => $request->request->get('graph_type'),
                'full_data' => $res,
                'data' => $formattedRes
            ],
            'title' => $request->request->get('title'),
            'population' => $request->request->get('population'),
            'product' => $request->request->get('product'),
            'description' => $request->request->get('description'),
        ]);
    }

    private function getAlias(string $key, $value)
    {
        $tab = [
            'product_code' => [
                '100218' => 'VITC',
                '417432' => 'SKC',
            ],
            'session_id' => [
                '1' => 'T0',
                '2' => 'T1',
                '3' => 'T7',
                '4' => 'T14',
            ],
            'score_skinbiosense' => [
                '1' => 'stress ox',
                '2' => 'hydra',
                '3' => 'barrière',
            ]
        ];


        return $tab[$key][$value];
    }

}
