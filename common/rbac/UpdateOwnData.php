<?php
namespace common\rbac;

use yii\rbac\Rule;

class UpdateOwnData extends Rule
{
    public $name = 'UpdateOwnData';

    public function execute($user_id, $item, $params)
    {
        //return FALSE;
        if($user_id === 1){
           // return TRUE;
        }
        return $params['model']->owner == $user_id;
    }
}
 ?>