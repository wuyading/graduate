<?php
namespace App\Login\Models;

use Zilf\Db\ActiveRecord;

/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 17-3-31
 * Time: 下午1:39
 */
class Sysadmin extends ActiveRecord
{
    public static function tableName()
    {
        return 'kexie_user.sysadmin';
    }
}