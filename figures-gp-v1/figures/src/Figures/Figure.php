<?php

namespace jfernancordova\Figures\Figures;

use jfernancordova\Figures\Functions\Functions;

/**
 * Class Figure
 */
abstract class Figure implements Functions
{

    const CIRCLE    = 'Circle';
    const TRIANGULE = 'Triangule';
    const SQUARE    = 'Square';

    /**
     * @return mixed|string
     */
    public function output()
    {
        return null;
    }


    /**
     * @return mixed|string
     */
    public function base()
    {
        return null;

    }

    /**
     * @return mixed|string
     */
    public function height()
    {
        return null;

    }

    /**
     * @return mixed|string
     */
    public function diameter()
    {
        return null;
    }

}