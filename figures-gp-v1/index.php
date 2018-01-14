<?php require_once("Autoloader.php");
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

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

die(\Helpers\ApiResponse::Response(1,\Helpers\ApiResponse::SUCCESS, $all));



