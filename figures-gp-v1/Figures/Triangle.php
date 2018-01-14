<?php

namespace Figures;

/**
 * Class Triangle
 * @package Figures
 */
class Triangle extends Figure {

    protected $base;
    protected $height;

    /**
     * Triangle constructor.
     * @param $base
     * @param $height
     */
    public function __construct($base, $height)
    {
        $this->base   = $base;
        $this->height = $height;
    }

    /**
     * @return mixed|string
     */
    public function base()
    {
        parent::base();
        return $this->base;

    }

    /**
     * @return mixed|string
     */
    public function height()
    {
        parent::height();
        return $this->height;
    }

    /**
     * @return mixed|string
     */
    public function output()
    {
        parent::output();
        return [Figure::TRIANGULE => $this->base * $this->height / 2];
    }

}