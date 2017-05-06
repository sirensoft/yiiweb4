<?php
namespace common\rbac;

use yii\rbac\Rule;

class UpdateOwnDataRule extends Rule
{
    public $name = 'UpdateOwnDataRule';

    public function execute($user, $item, $params)
    {
        return isset($params['model']) ? $params['model']->owner == $user : false;
    }
}
 ?>