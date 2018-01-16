<?php

namespace jfernancordova\Figures\Figures;

/**
 * Class Triangle
 * @package GeoPagos
 */
class Square extends Figure
{
    protected $side;

    /**
     * Triangle constructor.
     * @param $side
     */
    public function __construct($side)
    {
        $this->side = $side;
    }

    /**
     * @return mixed|string
     */
    public function base()
    {
        parent::base();
        return $this->side;
    }

    /**
     * @return mixed|string
     */
    public function height()
    {
        parent::height();
        return $this->side;
    }

    /**
     * @return mixed|string
     */
    public function output()
    {
        parent::output();
        return [Figure::SQUARE => $this->side * $this->side];
    }
}