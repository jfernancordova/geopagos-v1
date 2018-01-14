<?php

namespace Figures;

/**
 * Class Circle
 * @package GeoPagos
 */
class Circle extends Figure
{
    protected $diameter;

    /**
     * Circle constructor.
     * @param $diameter
     */
    public function __construct($diameter)
    {
        $this->diameter = $diameter;
    }

    /**
     * @return mixed|string
     */
    public function diameter()
    {
        parent::diameter();
        return $this->diameter;
    }

    /**
     * @return float|int|mixed|string
     */
    public function output()
    {
        parent::output();
        $radio = $this->diameter / 2;
        return [Figure::CIRCLE => pi() * $radio * $radio];
    }

}