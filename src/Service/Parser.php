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

    private function parseData(array $data): array
    {
        $res = [];
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

        return $res;
    }

    public function parseCsv(string $filename): array
    {
        $baseRoute = $this->parameters->get('kernel.project_dir');
        try {
            $reader = IOFactory::createReader('Csv');
            $spreadsheet = $reader->load("$baseRoute/public/uploads/reports/$filename.csv");

            $data = $spreadsheet->getSheet(0)->toArray();
            $res = $this->parseData($data);
        } catch (\Exception $e) {
            $res = [
                'error' => true,
                'error_message' => $e->getMessage()
            ];
        }

        return $res;
    }

    public function parseXls(string $filename): array
    {
        $baseRoute = $this->parameters->get('kernel.project_dir');
        try {
            $reader = IOFactory::createReader('Xlsx');
            $spreadsheet = $reader->load("$baseRoute/public/uploads/reports/$filename.xlsx");

            $data = $spreadsheet->getSheet(1)->toArray();
            $res = $this->parseData($data);
        } catch (\Exception $e) {
            $res = [
                'error' => true,
                'error_message' => $e->getMessage()
            ];
        }

        return $res;
    }
}