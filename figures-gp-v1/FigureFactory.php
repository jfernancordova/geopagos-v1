<?php require_once("Autoloader.php");

use Figures\Triangle;
use Figures\Circle;
use Figures\Square;
use Helpers\ApiResponse;
use Figures\Figure;

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