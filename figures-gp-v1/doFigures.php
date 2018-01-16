<?php require_once'figures/vendor/autoload.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

use jfernancordova\Figures\FigureFactory;
use jfernancordova\Figures\Helpers\ApiResponse;

$figures = [
    FigureFactory::createFigure('Circle', ['diameter' => 5]),
    FigureFactory::createFigure('Triangule', ['base' => 40, 'height' => 20]),
    FigureFactory::createFigure('Square',['side' => 22]),
];

$all = array_map(function($figures)
{
    return [
        'Figure'    => $figures->output(),
        'Base'      => $figures->base(),
        'Height'    => $figures->height(),
        'Diameter'  => $figures->diameter(),
    ];

}, $figures);

die(ApiResponse::Response(1,ApiResponse::SUCCESS, $all));



