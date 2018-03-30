<?php
/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 17-4-7
 * Time: 上午10:44
 */

namespace App\Models;


use JasonGrimes\Paginator;
use Zilf\Db\ActiveRecord;

class BaseModel extends ActiveRecord
{
    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    /**
     * 获取具有分页信息的数据列表
     *
     * @param string $where
     * @param $urlPattern
     * @param int $currentPage
     * @param array $options
     * @param int $itemsPerPage
     * @return array
     */
    public static function  getPageList($where='', $urlPattern, $currentPage=1,$options=[],$itemsPerPage=20){
        $find = self::find();
        if($where){
            $find->where($where);
        }

        if(!isset($options['orderBy'])){
            $find->orderBy('id desc');
        }

        if($options){
            foreach ($options as $name => $value){
                $find->$name($value);
            }
        }

        $totalItems = $find->count();
        $list = $find->offset(($currentPage-1)*$itemsPerPage)->limit($itemsPerPage)->asArray()->all();

        //分页数据
        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
        $paginator->setPreviousText('上一页');
        $paginator->setNextText('下一页');

        $data = [
            'list'=>$list,
            'page'=>$paginator,
        ];

        return $data;
    }
}