<?php

namespace App\Map;

use Symfony\UX\Map\InfoWindow;
use Symfony\UX\Map\Map;
use Symfony\UX\Map\Marker;
use Symfony\UX\Map\Point;
use Symfony\UX\Map\Polygon;

class MapManager
{
    public function createMap(): Map
    {
        $map = (new Map('default'))
            ->center(new Point(45.7534031, 4.8295061))
            ->zoom(12)
        ;

        $map->addMarker($this->createLyonMarker());
        $map->addMarker($this->createMarker(45.7623, 4.8213, 'Basilique Notre-Dame de Fourvière', 'Visitez la Basilique Notre-Dame de Fourvière, un lieu emblématique à Lyon.'));
        $map->addMarker($this->createMarker(45.7578, 4.8320, 'Place Bellecour', 'Découvrez la Place Bellecour, la plus grande place de Lyon.'));
        $map->addMarker($this->createMarker(45.7796, 4.8562, 'Parc de la Tête d\'Or', 'Profitez du Parc de la Tête d\'Or, un grand parc urbain de Lyon.'));

        $map->addPolygon($this->createCityPolygon());

        return $map;
    }

    private function createLyonMarker(): Marker
    {
        return new Marker(
            position: new Point(45.7534031, 4.8295061),
            title: 'Lyon',
            infoWindow: new InfoWindow(content: '<h2>Bienvenue à Lyon !</h2><p>C\'est une ville magnifique avec beaucoup de culture.</p>')
        );
    }

    private function createMarker(float $latitude, float $longitude, string $title, string $infoWindowContent): Marker
    {
        return new Marker(
            position: new Point($latitude, $longitude),
            title: $title,
            infoWindow: new InfoWindow(content: "<p>{$infoWindowContent}</p>")
        );
    }

    private function createCityPolygon(): Polygon
    {
        return new Polygon(
            points: [
                new Point(48.8566, 2.3522), // Paris
                new Point(45.7640, 4.8357), // Lyon
                new Point(43.2965, 5.3698), // Marseille
                new Point(44.8378, -0.5792), // Bordeaux
            ],
            infoWindow: new InfoWindow(content: 'Paris, Lyon, Marseille, Bordeaux')
        );
    }
}
