<?php
/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 16-9-8
 * Time: 下午1:49
 */

namespace App\Models;

use App\Category\Models\Category;

class Expert extends BaseModel
{
    function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    public static function tableName()
    {
        return 'expert';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}