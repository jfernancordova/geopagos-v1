<?php
namespace App\Functions;
use Illuminate\Database\Eloquent\Model;


/**
 * Interface Functions
 * @package App\Functions
 */
interface Functions
{

    /**
     * @param null $value
     * @param Model $resource
     * @param array []
     * @return mixed
     */
    public function validationForUsers($value = null, Model $resource, $array = []);

    /**
     * @param $value
     * @return mixed
     */
    public function ifExists($value);

    /**
     * @param $table
     * @param $current
     * @param $value
     * @return mixed
     */
    public function updateWithQuery($table, $current, $value);

}