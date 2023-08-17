<?php

namespace App;

use App\Models\TransactionBundle;

class ReportService
{
    private $startDate, $endDate, $type;


    public function setStartDate($value)
    {
        $this->startDate = $value;
        return $this;
    }

    public function setEndDate($value)
    {
        $this->endDate = $value;
        return $this;
    }

    public function setType($value)
    {
        $this->type = $value;
        return $this;
    }


    public function report()
    {

        $reports = TransactionBundle::where('type', $this->type)->whereBetween('date', [$this->startDate, $this->endDate])
            ->get();

        return $reports;
    }
}
