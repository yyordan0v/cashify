<?php

namespace App\Charts;

use marineusde\LarapexCharts\Charts\LineChart as OriginalLineChart;

class ExpensesChart
{
    public function build(): OriginalLineChart
    {
        return (new OriginalLineChart)
            ->addData('Physical sales', [40, 93, 35, 42, 18, 82])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
