<?php
namespace common\rbac;

use yii\rbac\Rule;

class MyRule extends Rule
{
    public $name = 'MyRule';

    public function execute($user_id, $item, $params)
    {
        return isset($params['model']) ? $params['model']->created_by == $user_id : false;
    }
}
 ?>