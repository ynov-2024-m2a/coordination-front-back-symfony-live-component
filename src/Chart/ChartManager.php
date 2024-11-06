<?php

namespace App\Chart;

use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class ChartManager
{
    public function __construct(private ChartBuilderInterface $builder)
    {
    }

    public function createLineChart(): Chart
    {
        $chart = $this->builder->createChart(Chart::TYPE_LINE);
        
        $chart->setData([
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'datasets' => [
                [
                    'label' => 'Produit A',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'data' => [120, 150, 180, 220, 300, 250, 280, 350, 330, 400, 420, 500],
                ],
                [
                    'label' => 'Produit B',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'data' => [100, 140, 160, 200, 260, 240, 270, 320, 310, 360, 380, 450],
                ],
                [
                    'label' => 'Produit C',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => [90, 110, 130, 170, 230, 210, 230, 290, 270, 330, 350, 400],
                ]
            ]
        ]);

        $chart->setOptions([
            'maintainAspectRatio' => false,
            'scales' => [
                'y' => [
                    'beginAtZero' => true
                ]
            ]
        ]);

        return $chart;
    }

    public function createBarChart(): Chart
    {
        $chart = $this->builder->createChart(Chart::TYPE_BAR);
        
        $chart->setData([
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'datasets' => [
                [
                    'label' => 'Produit A',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'data' => [120, 150, 180, 220, 300, 250, 280, 350, 330, 400, 420, 500],
                ],
                [
                    'label' => 'Produit B',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'data' => [100, 140, 160, 200, 260, 240, 270, 320, 310, 360, 380, 450],
                ],
                [
                    'label' => 'Produit C',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => [90, 110, 130, 170, 230, 210, 230, 290, 270, 330, 350, 400],
                ]
            ]
        ]);

        $chart->setOptions([
            'maintainAspectRatio' => false,
            'scales' => [
                'y' => [
                    'beginAtZero' => true
                ]
            ]
        ]);

        return $chart;
    }

    public function createScatterChart(): Chart
    {
        $chart = $this->builder->createChart(Chart::TYPE_SCATTER);
        
        $chart->setData([
            'datasets' => [
                [
                    'label' => 'Produit A',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'data' => [
                        ['x' => 1, 'y' => 120],
                        ['x' => 2, 'y' => 150],
                        ['x' => 3, 'y' => 180],
                        ['x' => 4, 'y' => 220],
                        ['x' => 5, 'y' => 300],
                        ['x' => 6, 'y' => 250],
                        ['x' => 7, 'y' => 280],
                        ['x' => 8, 'y' => 350],
                        ['x' => 9, 'y' => 330],
                        ['x' => 10, 'y' => 400],
                        ['x' => 11, 'y' => 420],
                        ['x' => 12, 'y' => 500],
                    ],
                ],
                [
                    'label' => 'Produit B',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'data' => [
                        ['x' => 1, 'y' => 100],
                        ['x' => 2, 'y' => 140],
                        ['x' => 3, 'y' => 160],
                        ['x' => 4, 'y' => 200],
                        ['x' => 5, 'y' => 260],
                        ['x' => 6, 'y' => 240],
                        ['x' => 7, 'y' => 270],
                        ['x' => 8, 'y' => 320],
                        ['x' => 9, 'y' => 310],
                        ['x' => 10, 'y' => 360],
                        ['x'=> 11, 'y' => 380],
                        ['x' => 12, 'y' => 450],
                    ],
                ],
                [
                    'label' => 'Produit C',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => [
                        ['x' => 1, 'y' => 90],
                        ['x' => 2, 'y' => 110],
                        ['x' => 3, 'y' => 130],
                        ['x' => 4, 'y' => 170],
                        ['x' => 5, 'y' => 230],
                        ['x' => 6, 'y' => 210],
                        ['x' => 7, 'y' => 230],
                        ['x' => 8, 'y' => 290],
                        ['x' => 9, 'y' => 270],
                        ['x' => 10, 'y' => 330],
                        ['x' => 11, 'y' => 350],
                        ['x' => 12, 'y' => 400],
                    ],
                ]
            ]
        ]);

        $chart->setOptions([
            'maintainAspectRatio' => false,
            'scales' => [
                'y' => [
                    'beginAtZero' => true
                ]
            ]
        ]);

        return $chart;
    }

    public function createRadarChart(): Chart
    {
        $chart = $this->builder->createChart(Chart::TYPE_RADAR);
        
        $chart->setData([
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'datasets' => [
                [
                    'label' => 'Produit A',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'data' => [120, 150, 180, 220, 300, 250, 280, 350, 330, 400, 420, 500],
                ],
                [
                    'label' => 'Produit B',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'data' => [100, 140, 160, 200, 260, 240, 270, 320, 310, 360, 380, 450],
                ],
                [
                    'label' => 'Produit C',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => [90, 110, 130, 170, 230, 210, 230, 290, 270, 330, 350, 400],
                ]
            ]
        ]);

        $chart->setOptions([
            'maintainAspectRatio' => false,
            'scales' => [
                'y' => [
                    'beginAtZero' => true
                ]
            ]
        ]);

        return $chart;
    }

    public function createPieChart(): Chart
    {
        $chart = $this->builder->createChart(Chart::TYPE_PIE);

        $chart->setData([
            'labels' => ['Produit A', 'Produit B', 'Produit C'],
            'datasets' => [
                [
                    'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(75, 192, 192, 0.2)'],
                    'borderColor' => ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(75, 192, 192, 1)'],
                    'data' => [500, 450, 400],
                ]
            ]
        ]);

        $chart->setOptions([
            'maintainAspectRatio' => false,
            'scales' => [
                'y' => [
                    'beginAtZero' => true
                ]
            ]
        ]);

        return $chart;
    }

    public function createDoughnutChart(): Chart
    {
        $chart = $this->builder->createChart(Chart::TYPE_DOUGHNUT);

        $chart->setData([
            'labels' => ['Produit A', 'Produit B', 'Produit C'],
            'datasets' => [
                [
                    'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(75, 192, 192, 0.2)'],
                    'borderColor' => ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(75, 192, 192, 1)'],
                    'data' => [500, 450, 400],
                ]
            ]
        ]);

        $chart->setOptions([
            'maintainAspectRatio' => false,
            'scales' => [
                'y' => [
                    'beginAtZero' => true
                ]
            ]
        ]);
        
        return $chart;
    }

    public function createPolarAreaChart(): Chart
    {
        $chart = $this->builder->createChart(Chart::TYPE_POLAR_AREA);

        $chart->setData([
            'labels' => ['Produit A', 'Produit B', 'Produit C'],
            'datasets' => [
                [
                    'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(75, 192, 192, 0.2)'],
                    'borderColor' => ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(75, 192, 192, 1)'],
                    'data' => [500, 450, 400],
                ]
            ]
        ]);

        $chart->setOptions([
            'maintainAspectRatio' => false,
            'scales' => [
                'y' => [
                    'beginAtZero' => true
                ]
            ]
        ]);
            
        return $chart;
    }

    public function createBubbleChart(): Chart
    {
        $chart = $this->builder->createChart(Chart::TYPE_BUBBLE);

        $chart->setData([
            'datasets' => [
                [
                    'label' => 'Produit A',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'data' => [
                        ['x' => 1, 'y' => 120, 'r' => 10],
                        ['x' => 2, 'y' => 150, 'r' => 20],
                        ['x' => 3, 'y' => 180, 'r' => 30],
                        ['x' => 4, 'y' => 220, 'r' => 40],
                        ['x' => 5, 'y' => 300, 'r' => 50],
                        ['x' => 6, 'y' => 250, 'r' => 60],
                        ['x' => 7, 'y' => 280, 'r' => 70],
                        ['x' => 8, 'y' => 350, 'r' => 80],
                        ['x' => 9, 'y' => 330, 'r' => 90],
                        ['x' => 10, 'y' => 400, 'r' => 100],
                        ['x' => 11, 'y' => 420, 'r' => 110],
                        ['x' => 12, 'y' => 500, 'r' => 120],
                    ],
                ],
                [
                    'label' => 'Produit B',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'data' => [
                        ['x' => 1, 'y' => 100, 'r' => 10],
                        ['x' => 2, 'y' => 140, 'r' => 20],
                        ['x' => 3, 'y' => 160, 'r' => 30],
                        ['x' => 4, 'y' => 200, 'r' => 40],
                        ['x' => 5, 'y' => 260, 'r' => 50],
                        ['x' => 6, 'y' => 240, 'r' => 60],
                        ['x' => 7, 'y' => 270, 'r' => 70],
                        ['x' => 8, 'y' => 320, 'r' => 80],
                        ['x' => 9, 'y' => 310, 'r' => 90],
                        ['x' => 10, 'y' => 360, 'r' => 100],
                        ['x' => 11, 'y' => 380, 'r' => 110],
                        ['x' => 12, 'y' => 450, 'r' => 120],
                    ],
                ],
                [
                    'label' => 'Produit C',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => [
                        ['x' => 1, 'y' => 90, 'r' => 10],
                        ['x' => 2, 'y' => 110, 'r' => 20],
                        ['x' => 3, 'y' => 130, 'r' => 30],
                        ['x' => 4, 'y' => 170, 'r' => 40],
                        ['x' => 5, 'y' => 230, 'r' => 50],
                        ['x' => 6, 'y' => 210, 'r' => 60],
                        ['x' => 7, 'y' => 230, 'r' => 70],
                        ['x' => 8, 'y' => 290, 'r' => 80],
                        ['x' => 9, 'y' => 270, 'r' => 90],
                        ['x' => 10, 'y' => 330, 'r' => 100],
                        ['x' => 11, 'y' => 350, 'r' => 110],
                        ['x' => 12, 'y' => 400, 'r' => 120],
                    ],
                ]
            ]
        ]);

        $chart->setOptions([
            'maintainAspectRatio' => false,
            'scales' => [
                'y' => [
                    'beginAtZero' => true
                ]
            ]
        ]);

        return $chart;
    }       
}
