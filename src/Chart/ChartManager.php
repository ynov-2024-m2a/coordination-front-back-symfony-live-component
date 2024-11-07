<?php

namespace App\Chart;

use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class ChartManager
{
    private const DATA_LABELS = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    private const LABEL_PRODUCT_A = 'Produit A';
    private const COLOR_PRODUCT_A = 'rgba(255, 99, 132, 0.2)';
    private const BG_PRODUCT_A = 'rgba(255, 99, 132, 1)';
    private const DATA_PRODUCT_A = [120, 150, 180, 220, 300, 250, 280, 350, 330, 400, 420, 500];

    private const LABEL_PRODUCT_B = 'Produit B';
    private const COLOR_PRODUCT_B = 'rgba(54, 162, 235, 0.2)';
    private const BG_PRODUCT_B = 'rgba(54, 162, 235, 1)';
    private const DATA_PRODUCT_B = [100, 140, 160, 200, 260, 240, 270, 320, 310, 360, 380, 450];

    private const LABEL_PRODUCT_C = 'Produit C';
    private const COLOR_PRODUC_C = 'rgba(75, 192, 192, 0.2)';
    private const BG_PRODUCT_C = 'rgba(75, 192, 192, 1)';
    private const DATA_PRODUCT_C = [90, 110, 130, 170, 230, 210, 230, 290, 270, 330, 350, 400];

    private const DATA_BUBBLE = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120];

    private const CHART_TYPES = [
        'lineChart' => Chart::TYPE_LINE,
        'barChart' => Chart::TYPE_BAR,
        'scatterChart' => Chart::TYPE_SCATTER,
        'radarChart' => Chart::TYPE_RADAR,
        'pieChart' => Chart::TYPE_PIE,
        'doughnutChart' => Chart::TYPE_DOUGHNUT,
        'polarAreaChart' => Chart::TYPE_POLAR_AREA,
        'bubbleChart' => Chart::TYPE_BUBBLE,
    ];

    public function __construct(private ChartBuilderInterface $builder)
    {
    }

    /**
     * @return Chart[]
     */
    public function createAllCharts(): array
    {
        $charts = [];

        foreach (self::CHART_TYPES as $key => $type) {
            $charts[$key] = $this->createChart($type);
        }

        return $charts;
    }

    public function createChart(string $type): Chart
    {
        $chart = $this->builder->createChart($type);
        $chart->setData($this->getCommonData($type));
        $chart->setOptions($this->getDefaultOptions());

        return $chart;
    }

    /**
     * @return array<string, mixed>
     */
    private function getCommonData(string $type): array
    {
        if ($type === Chart::TYPE_BUBBLE) {
            return $this->getBubbleData();
        } elseif (in_array($type, [Chart::TYPE_SCATTER])) {
            return $this->getScatterData();
        } elseif (in_array($type, [Chart::TYPE_PIE, Chart::TYPE_DOUGHNUT, Chart::TYPE_POLAR_AREA])) {
            return $this->getPieDoughnutPolarData();
        } else {
            return $this->getStandardData();
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function getBubbleData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => self::LABEL_PRODUCT_A,
                    'backgroundColor' => self::COLOR_PRODUCT_A,
                    'borderColor' => self::BG_PRODUCT_A,
                    'data' => array_map(
                        fn($y, $x, $r) => ['x' => $x, 'y' => $y, 'r' => $r],
                        self::DATA_PRODUCT_A, range(1, 12), self::DATA_BUBBLE
                    ),
                ],
                [
                    'label' => self::LABEL_PRODUCT_B,
                    'backgroundColor' => self::COLOR_PRODUCT_B,
                    'borderColor' => self::BG_PRODUCT_B,
                    'data' => array_map(
                        fn($y, $x, $r) => ['x' => $x, 'y' => $y, 'r' => $r],
                        self::DATA_PRODUCT_B, range(1, 12), self::DATA_BUBBLE
                    ),
                ],
                [
                    'label' => self::LABEL_PRODUCT_C,
                    'backgroundColor' => self::COLOR_PRODUC_C,
                    'borderColor' => self::BG_PRODUCT_C,
                    'data' => array_map(
                        fn($y, $x, $r) => ['x' => $x, 'y' => $y, 'r' => $r],
                        self::DATA_PRODUCT_C, range(1, 12), self::DATA_BUBBLE
                    ),
                ]
            ]
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function getScatterData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => self::LABEL_PRODUCT_A,
                    'backgroundColor' => self::COLOR_PRODUCT_A,
                    'borderColor' => self::BG_PRODUCT_A,
                    'data' => array_map(fn($y, $x) => ['x' => $x, 'y' => $y], self::DATA_PRODUCT_A, range(1, 12))
                ],
                [
                    'label' => self::LABEL_PRODUCT_B,
                    'backgroundColor' => self::COLOR_PRODUCT_B,
                    'borderColor' => self::BG_PRODUCT_B,
                    'data' => array_map(fn($y, $x) => ['x' => $x, 'y' => $y], self::DATA_PRODUCT_B, range(1, 12))
                ],
                [
                    'label' => self::LABEL_PRODUCT_C,
                    'backgroundColor' => self::COLOR_PRODUC_C,
                    'borderColor' => self::BG_PRODUCT_C,
                    'data' => array_map(fn($y, $x) => ['x' => $x, 'y' => $y], self::DATA_PRODUCT_C, range(1, 12))
                ]
            ]
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function getPieDoughnutPolarData(): array
    {
        return [
            'labels' => [self::LABEL_PRODUCT_A, self::LABEL_PRODUCT_B, self::LABEL_PRODUCT_C],
            'datasets' => [
                [
                    'backgroundColor' => [
                        self::COLOR_PRODUCT_A,
                        self::COLOR_PRODUCT_B,
                        self::COLOR_PRODUC_C
                    ],
                    'borderColor' => [
                        self::BG_PRODUCT_A,
                        self::BG_PRODUCT_B, 
                        self::BG_PRODUCT_C
                    ],
                    'data' => [
                        array_sum(self::DATA_PRODUCT_A),
                        array_sum(self::DATA_PRODUCT_B),
                        array_sum(self::DATA_PRODUCT_C)
                    ],
                ]
            ]
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function getStandardData(): array
    {
        return [
            'labels' => self::DATA_LABELS,
            'datasets' => [
                [
                    'label' => self::LABEL_PRODUCT_A,
                    'backgroundColor' => self::COLOR_PRODUCT_A,
                    'borderColor' => self::BG_PRODUCT_A,
                    'data' => self::DATA_PRODUCT_A,
                ],
                [
                    'label' => self::LABEL_PRODUCT_B,
                    'backgroundColor' => self::COLOR_PRODUCT_B,
                    'borderColor' => self::BG_PRODUCT_B,
                    'data' => self::DATA_PRODUCT_B,
                ],
                [
                    'label' => self::LABEL_PRODUCT_C,
                    'backgroundColor' => self::COLOR_PRODUC_C,
                    'borderColor' => self::BG_PRODUCT_C,
                    'data' => self::DATA_PRODUCT_C,
                ]
            ]
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function getDefaultOptions(): array
    {
        return [
            'maintainAspectRatio' => false,
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                ],
            ],
        ];
    }
}
