<?php
/**
 * Created by PhpStorm.
 * User: eirlie
 * Date: 15.04.16
 * Time: 15:56
 */

namespace services\validation\constraints;


interface Constraint
{
    public function validate($value);
}