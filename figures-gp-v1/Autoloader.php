<?php

/**
 * Class Autoloader
 */
class Autoloader {

    /**
     * @param $className
     * @return bool
     */
    static public function loader($className)
    {
        $filename = str_replace("\\", '/', $className) . ".php";

        if (file_exists($filename))
        {
            include($filename);

            if (class_exists($className))
            {
                return true;
            }
        }

        return true;
    }
}

spl_autoload_register('Autoloader::loader');