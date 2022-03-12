<?php

namespace App\Service;

class ReportHandler
{
    public function __construct()
    {
    }

    private function getTemplateConfig()
    {
        return [
            [
                'label' => 'Info1',
                'reference' => 'zone_code',
            ],
            [
                'label' => 'Info2',
                'reference' => 'score_skinbiosense',
            ],
            [
                'label' => 'Info3',
                'reference' => 'mesure',
            ],
        ];
    }

    public function generateReport()
    {
        $template = $this->getTemplateConfig();


    }

    public function toJson()
    {

    }
}