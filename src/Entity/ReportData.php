<?php

namespace App\Entity;

use App\Repository\ReportDataRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ReportDataRepository::class)
 * @Vich\Uploadable
 */
class ReportData
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $report;

    /**
     * @Vich\UploadableField(mapping="report_data", fileNameProperty="report")
     * @var File
     */
    private $reportFile;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param string $report
     */
    public function setReport(string $report): self
    {
        $this->report = $report;

        return $this;
    }

    /**
     * @return string
     */
    public function getReport(): ?string
    {
        return $this->report;
    }

    /**
     * @param File $reportFile
     */
    public function setReportFile(File $reportFile): self
    {
        $this->reportFile = $reportFile;

        return $this;
    }

    /**
     * @return File
     */
    public function getReportFile(): ?File
    {
        return $this->reportFile;
    }


}
