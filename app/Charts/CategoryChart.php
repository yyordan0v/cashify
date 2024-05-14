<?php

namespace App\Charts;

use marineusde\LarapexCharts\Charts\DonutChart as OriginalDonutChart;

class CategoryChart
{
    public function build(): OriginalDonutChart
    {
        return (new OriginalDonutChart)
            ->addData([20, 24, 30, 40, 20, 10, 100, 90])
            ->setLabels([
                'Category 1', 'Category 2', 'Category 3', 'Category 4', 'Category 5', 'Category 6', 'Category 7',
                'Category 8'
            ])
            ->setHeight(170)
            ->setFontColor('#808080')
            ->setShowLegend('false');
    }
}
