<?php 

namespace jfernancordova\Figures;

use jfernancordova\Figures\Figures\Triangle;
use jfernancordova\Figures\Figures\Circle;
use jfernancordova\Figures\Figures\Square;
use jfernancordova\Figures\Helpers\ApiResponse;
use jfernancordova\Figures\Figures\Figure;

/**
 * Class FigureFactory
 */
class FigureFactory
{

    /**
     * @param $figure
     * @param array $values
     * @return string
     */
    public static function createFigure($figure, $values = [])
    {
        $result = null;

        switch($figure)
        {
            case Figure::CIRCLE:
                $result = new Circle($values['diameter']);
                break;
            case Figure::TRIANGULE:
                $result = new Triangle($values['base'], $values['height']);
                break;
            case Figure::SQUARE:
                $result = new Square($values['side']);
        }

        return $result;

        //return ApiResponse::Response(1,ApiResponse::SUCCESS, $result);
    }
}