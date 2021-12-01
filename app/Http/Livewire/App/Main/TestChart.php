<?php

namespace App\Http\Livewire\App\Main;

use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Livewire\Component;

class TestChart extends Component
{
    public $firstRun = true;
    public $showDataLabels = false;

    public function render()
    {
        $columnChartModel =
            (new ColumnChartModel())
                ->setTitle('Expenses by Type')
                ->addColumn('Food', 75, '#f6ad55')
                ->addColumn('Test', 75, '#f6fd55')
        ;

        return view('livewire.app.main.test-chart', ['columnChartModel' => $columnChartModel]);
    }
}
