<?php

namespace App\Charts;

use marineusde\LarapexCharts\Charts\AreaChart as OriginalAreaChart;

class BalanceChart
{
    public function build(): OriginalAreaChart
    {
        return (new OriginalAreaChart)
            ->addData('Balance', [50, 20, 100, 200, 300, 20, 50])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', 'July'])
            ->setColors(['#808080'])
            ->setFontColor('#808080')
            ->setHeight(350)
            ->setSubtitle('2024')
            ->setGrid();
    }
}
