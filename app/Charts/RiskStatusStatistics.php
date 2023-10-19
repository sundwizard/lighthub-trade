<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\RiskRegister;

class RiskStatusStatistics
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $high = 0;
        $low = 0;
        $medium = 0;

        $risks = RiskRegister::all();

        foreach($risks as $risk){
            $riskstatus = getRiskRating($risk->risk_impact->scale*$risk->likelihood->scale);
            if($riskstatus=="Medium"){
                $medium = $medium + 1;
            }elseif($riskstatus=="High"){
                $high = $high + 1;
            }else{
                $low = $low + 1;
            }
        }
        $total = $high+$low+$medium;

        $high = (int)(($high/$total)*100);
        $low = (int)(($low/$total)*100);
        $medium = (int)(($medium/$total)*100);

        return $this->chart->pieChart()
            ->setTitle('NCC Risk Statistics.')
            ->setSubtitle('Risk Statistics.')
            ->addData([$high, $medium, $low])
            ->setLabels(['High', 'Medium', 'Low']);
    }
}
