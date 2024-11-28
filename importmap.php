<?php

/**
 * Returns the importmap for this application.
 *
 * - "path" is a path inside the asset mapper system. Use the
 *     "debug:asset-map" command to see the full list of paths.
 *
 * - "entrypoint" (JavaScript only) set to true for any module that will
 *     be used as an "entrypoint" (and passed to the importmap() Twig function).
 *
 * The "importmap:require" command can be used to add new entries to this file.
 */
return [
    'app' => [
        'path' => './assets/app.js',
        'entrypoint' => true,
    ],
    'app-vue' => [
        'path' => './assets/vue/app-vue.js',
        'entrypoint' => true,
    ],
    '@symfony/stimulus-bundle' => [
        'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
    ],
    '@symfony/ux-live-component' => [
        'path' => './vendor/symfony/ux-live-component/assets/dist/live_controller.js',
    ],
    '@symfony/ux-vue' => [
        'path' => './vendor/symfony/ux-vue/assets/dist/loader.js',
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    '@hotwired/turbo' => [
        'version' => '8.0.12',
    ],
    'tom-select' => [
        'version' => '2.3.1',
    ],
    'tom-select/dist/css/tom-select.default.css' => [
        'version' => '2.3.1',
        'type' => 'css',
    ],
    'vue' => [
        'version' => '3.5.12',
        'package_specifier' => 'vue/dist/vue.esm-bundler.js',
    ],
    '@vue/runtime-dom' => [
        'version' => '3.5.12',
    ],
    '@vue/compiler-dom' => [
        'version' => '3.5.12',
    ],
    '@vue/shared' => [
        'version' => '3.5.12',
    ],
    '@vue/runtime-core' => [
        'version' => '3.5.12',
    ],
    '@vue/compiler-core' => [
        'version' => '3.5.12',
    ],
    '@vue/reactivity' => [
        'version' => '3.5.12',
    ],
    'chart.js' => [
        'version' => '3.9.1',
    ],
    '@googlemaps/js-api-loader' => [
        'version' => '1.16.8',
    ],
    'leaflet' => [
        'version' => '1.9.4',
    ],
    'leaflet/dist/leaflet.min.css' => [
        'version' => '1.9.4',
        'type' => 'css',
    ],
    '@symfony/ux-leaflet-map' => [
        'path' => './vendor/symfony/ux-leaflet-map/assets/dist/map_controller.js',
    ],
    'typed.js' => [
        'version' => '2.1.0',
    ],
];
