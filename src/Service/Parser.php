<?php

namespace App\Service;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class Parser
{
    public function __construct(private ParameterBagInterface $parameters)
    {
    }

    public function getHeaders(string $filename): array
    {
        $baseRoute = $this->parameters->get('kernel.project_dir');
        $reader = IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load("$baseRoute/uploads/$filename.xlsx");
        $data = $spreadsheet->getSheet(1)->toArray();

        // Get headers (Check if header is not located at first row)
        $i = 0;
        do {
            $filters = array_filter($data[$i]);
            $headers = $data[$i++];
        } while (empty($filters));

        return $headers;
    }

    public function parseXls(string $filename): array
    {
        $res = [];
        $baseRoute = $this->parameters->get('kernel.project_dir');
        try {
            $reader = IOFactory::createReader('Xlsx');
            $spreadsheet = $reader->load("$baseRoute/uploads/$filename.xlsx");

            $data = $spreadsheet->getSheet(1)->toArray();
            $dataLength = count($data);

            // Get headers (Check if header is not located at first row)
            $i = 0;
            do {
                $filters = array_filter($data[$i]);
                $headers = $data[$i++];
            } while (empty($filters));


            // Combine headers & cell value to associative array
            for ($row = $i; $row < $dataLength; $row++) {
                $rowData = [];
                foreach ($headers as $key => $header) {
                    if (!is_null($header)) {
                        $rowData[$header] = $data[$row][$key];
                    }
                }

                if (!empty($rowData)) {
                    $res[] = $rowData;
                }
            }

        } catch (\Exception $e) {
            $res = [
                'error' => true,
                'error_message' => $e->getMessage()
            ];
        }

        return $res;
    }
}