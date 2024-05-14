<?php

namespace App\Charts;

use marineusde\LarapexCharts\Charts\AreaChart as OriginalAreaChart;

class IncomeChart
{
    public function build(): OriginalAreaChart
    {
        return (new OriginalAreaChart)
            ->addData('May', [
                3200, 1500, 2950, 1800, 250, 3750, 410, 3100, 950, 2100, 3800, 800, 3400, 1450, 2050, 1750, 350, 3800,
                3700, 2700, 900, 1900, 450, 3200, 3900, 1600, 2700, 3100, 1250, 2850, 1400
            ])
            ->setXAxis([
                '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18',
                '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'
            ])
            ->setColors(['#808080'])
            ->setFontColor('#808080')
            ->setHeight(350)
            ->setGrid();
    }
}
