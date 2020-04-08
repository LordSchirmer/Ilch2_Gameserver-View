<?php
/**
 * @copyright Ilch
 * @package ilch
 */

namespace Modules\Gameserver\Boxes;

use Modules\Gameserver\Mappers\Server as ServerMapper;

class Gameserver extends \Ilch\Box
{
    public function render()
    {
        $serverMapper = new ServerMapper();
        $this->getView()->set('server', $serverMapper->getServers(['zone' => 0]));
    }
}
