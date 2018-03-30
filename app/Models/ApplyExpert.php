<?php
/**
 * Created by PhpStorm.
 * User: wuyading1993
 * Date: 2017/4/15
 * Time: 10:31
 */

namespace App\Models;

class ApplyExpert extends BaseModel
{
    function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    public static function tableName()
    {
        return 'apply_expert';
    }
}