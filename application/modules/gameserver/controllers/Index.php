<?php
/**
 * @copyright Ilch 2
 * @package ilch
 */

namespace Modules\Gameserver\Controllers;

use Modules\Gameserver\Mappers\Server as ServerMapper;

class Index extends \Ilch\Controller\Frontend
{
    public function indexAction()
    {
        $serverMapper = new ServerMapper();
        
        $this->getLayout()->header()->css('static/css/gameserver_index.css');
        $this->getLayout()->getHmenu()->add($this->getTranslator()->trans('menuGameserver'), ['action' => 'index']);
    }
    
    public function showAction()
    {
        $serverMapper = new ServerMapper();
        
        $id = $this->getRequest()->getParam('id');
        
        $this->getLayout()->header()->css('static/css/gameserver_show.css');
        $this->getLayout()->getHmenu()->add($this->getTranslator()->trans('menuGameserver'), ['action' => 'index'])
            ->add($serverMapper->getServerType($id), ['action' => 'show', 'id' => $id]);
    }
}
