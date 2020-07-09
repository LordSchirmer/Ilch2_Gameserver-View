<?php
/**
 * @copyright Ilch 2
 * @package ilch
 */

namespace Modules\Gameserver\Controllers\Admin;

use Modules\Gameserver\Mappers\Server as ServerMapper;
use Modules\Gameserver\Models\Server as ServerModel;
use Modules\Gameserver\Mappers\Settings as SettingsMapper;
use Modules\Gameserver\Models\Settings as SettingsModel;

use Ilch\Validation;

class Index extends \Ilch\Controller\Admin
{
    public function init()
    {
        $items = [
            [
                'name' => 'menuServers',
                'active' => false,
                'icon' => 'fa fa-th-list',
                'url' => $this->getLayout()->getUrl(['controller' => 'index', 'action' => 'index']),
                [
                    'name' => 'addServers',
                    'active' => false,
                    'icon' => 'fa fa-plus-circle',
                    'url' => $this->getLayout()->getUrl(['controller' => 'index', 'action' => 'show'])
                ]
            ],
            [
                'name' => 'settingServers',
                'active' => false,
                'icon' => 'fa fa-cogs',
                'url' => $this->getLayout()->getUrl(['controller' => 'index', 'action' => 'settings'])
            ],
            [
                'name' => 'infoServers',
                'active' => false,
                'icon' => 'fa fa-info',
                'url' => $this->getLayout()->getUrl(['controller' => 'index', 'action' => 'info'])
            ]
        ];

        if ($this->getRequest()->getActionName() === 'show') {
            $items[0][0]['active'] = true;
        } else if ($this->getRequest()->getActionName() === 'settings') {
            $items[1]['active'] = true;
        } else if ($this->getRequest()->getActionName() === 'info') {
            $items[2]['active'] = true;
        } else {
            $items[0]['active'] = true;
        }

        $this->getLayout()->addMenu
        (
            'menuGameserver',
            $items
        );
    }

    public function indexAction()
    {
        $serverMapper = new ServerMapper();

        $this->getLayout()->getAdminHmenu()
                ->add($this->getTranslator()->trans('menuGameserver'), ['action' => 'index'])
                ->add($this->getTranslator()->trans('manage'), ['action' => 'index']);

        if ($this->getRequest()->getPost('action') === 'delete' && $this->getRequest()->getPost('check_servers')) {
            foreach ($this->getRequest()->getPost('check_servers') as $receiveId) {
                $serverMapper->delete($receiveId);
            }
        } elseif ($this->getRequest()->getPost('save') && $this->getRequest()->getPost('positions')) {
            $postData = $this->getRequest()->getPost('positions');
            $positions = explode(',', $postData);
            foreach ($positions as $x => $xValue) {
                $serverMapper->updatePositionById($xValue, $x);
            }
            $this->addMessage('saveSuccess');
            $this->redirect(['action' => 'index']);
        } elseif ($this->getRequest()->getPost('delcache')) {
            $serverMapper->deleteServerCache();
            $this->addMessage('delcacheSuccess');
            $this->redirect(['action' => 'index']);
        }

        $this->getView()->set('servers', $serverMapper->getServers());
    }

    public function showAction()
    {
        $serverMapper = new ServerMapper();
        
        if ($this->getRequest()->getParam('id')) {
            $this->getLayout()->getAdminHmenu()
                 ->add($this->getTranslator()->trans('menuGameserver'), ['action' => 'index'])
                 ->add($this->getTranslator()->trans('edit'), ['action' => 'show', 'id' => $this->getRequest()->getParam('id')]);
            $this->getView()->set('server', $serverMapper->getServerById($this->getRequest()->getParam('id')));
        } else {
            $this->getLayout()->getAdminHmenu()
                 ->add($this->getTranslator()->trans('menuGameserver'), ['action' => 'index'])
                 ->add($this->getTranslator()->trans('addServers'), ['action' => 'show']);
        }

        if ($this->getRequest()->isPost()) {
            $validation = Validation::create($this->getRequest()->getPost(), [
                'type' => 'required',
                'ip' => 'required',
                'c_port' => 'required|numeric|integer|min:0|max:99999'
            ]);

            if ($validation->isValid()) {
                $model = new ServerModel();

                if ($this->getRequest()->getParam('id')) {
                    $model->setId($this->getRequest()->getParam('id'));
                }
                
                $type = trim($this->getRequest()->getPost('type'));
                $ip = trim($this->getRequest()->getPost('ip'));
                $c_port = empty($this->getRequest()->getPost('c_port')) ? 0 : (int)trim($this->getRequest()->getPost('c_port'));
                $q_port = empty($this->getRequest()->getPost('q_port')) ? 0 : (int)trim($this->getRequest()->getPost('q_port'));
                $s_port = empty($this->getRequest()->getPost('s_port')) ? 0 : (int)trim($this->getRequest()->getPost('s_port'));
                
                if (preg_match("/(\[[0-9a-z\:]+\])/iU", $ip, $match)) {
                    $ip = $match[1];
                }
                elseif (preg_match("/([0-9a-z\.\-]+)/i", $ip, $match)) {
                    $ip = $match[1];
                }
                else {
                    $ip = $ip;
                }
                
                if ($c_port > 65535 || $c_port < 1024) { $c_port = 0; }
                if ($q_port > 65535 || $q_port < 1024) { $q_port = 0; }
                
                list($c_port, $q_port, $s_port) = lgsl_port_conversion($type, $c_port, $q_port, $s_port);
                
                $model->setType($type);
                $model->setIp($ip);
                $model->setC_port($c_port);
                $model->setQ_port($q_port);
                $model->setS_port($s_port);
                $model->setZone($this->getRequest()->getPost('zone'));
                $model->setDisabled($this->getRequest()->getPost('disabled'));
                $model->setComment($this->getRequest()->getPost('comment'));
                $serverMapper->save($model);

                $this->redirect(['action' => 'index']);
            } else {
                $this->addMessage($validation->getErrorBag()->getErrorMessages(), 'danger', true);
                $this->redirect()
                     ->withInput()
                     ->withErrors($validation->getErrorBag())
                     ->to(['action' => 'show', 'id' => $this->getRequest()->getParam('id')]);
            }
        }
    }
    
    public function settingsAction()
    {
        $settingsMapper = new SettingsMapper();
        
        $this->getLayout()->getAdminHmenu()
        ->add($this->getTranslator()->trans('menuGameserver'), ['action' => 'index'])
        ->add($this->getTranslator()->trans('settingServers'), ['action' => 'settings']);
        $this->getView()->set('settings', $settingsMapper->getServerConfig());
        
        if ($this->getRequest()->isPost()) {
            $validation = Validation::create($this->getRequest()->getPost(), [
                'cacheTime' => 'required',
                'liveTime' => 'required',
                'zoneLineSize' => 'required',
                'zoneHeightLimit' => 'required'
            ]);

            if ($validation->isValid()) {
                $model = new SettingsModel();
                
                $model->setId($this->getRequest()->getPost('id'));
                $model->setShowLocation($this->getRequest()->getPost('showLocation'));
                $model->setFixLocation($this->getRequest()->getPost('fixLocation'));
                $model->setSortServers($this->getRequest()->getPost('sortServers'));
                $model->setSortPlayers($this->getRequest()->getPost('sortPlayers'));
                $model->setCacheTime($this->getRequest()->getPost('cacheTime'));
                $model->setLiveTime($this->getRequest()->getPost('liveTime'));
                $model->setTimeOut($this->getRequest()->getPost('timeOut'));
                $model->setRetryOffline($this->getRequest()->getPost('retryOffline'));
                $model->setHostToIp($this->getRequest()->getPost('hostToIp'));
                $model->setZonePlayer($this->getRequest()->getPost('zonePlayer'));
                $model->setZoneLineSize($this->getRequest()->getPost('zoneLineSize'));
                $model->setZoneHeightLimit($this->getRequest()->getPost('zoneHeightLimit'));     
                $settingsMapper->updateServerConfig($model);
                
                $this->addMessage('saveSuccess');
                $this->redirect(['action' => 'settings']);
            } else {
                $this->addMessage($validation->getErrorBag()->getErrorMessages(), 'danger', true);
                $this->redirect()
                     ->withInput()
                     ->withErrors($validation->getErrorBag())
                     ->to(['action' => 'settings']);
            }
        }
    }
    
    public function infoAction()
    {
        $serverMapper = new ServerMapper();
        
        $this->getLayout()->getAdminHmenu()
                ->add($this->getTranslator()->trans('menuGameserver'), ['action' => 'index'])
                ->add($this->getTranslator()->trans('infoServers'), ['action' => 'info']);
        
        $this->getView()->set('info', 0);

    }
    
    public function deleteAction()
    {
        if ($this->getRequest()->isSecure()) {
            $serverMapper = new ServerMapper();
            $serverMapper->delete($this->getRequest()->getParam('id'));
        }

        $this->redirect(['action' => 'index']);
    }
}
