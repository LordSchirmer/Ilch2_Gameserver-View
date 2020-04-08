<?php
/**
 * @copyright Ilch 2
 * @package ilch
 */

namespace Modules\Gameserver\Mappers;

use Modules\Gameserver\Models\Settings as SettingsModel;

/**
 * The settings mapper class.
 *
 * @package ilch
 */
class Settings extends \Ilch\Mapper
{
    /**
     * Gets serverconfig.
     *
     * @return ServerModel|null
     */
    public function getServerConfig()
    {
        $serverRow = $this->db()->select('*')
            ->from('gameserver_config')
            ->where(['id' => '1'])
            ->execute()
            ->fetchAssoc();

        if (empty($serverRow)) {
            return null;
        }

        $model = new SettingsModel();
        $model->setId($serverRow['id']);
        $model->setShowLocation($serverRow['showLocation']);
        $model->setFixLocation($serverRow['fixLocation']);
        $model->setSortServers($serverRow['sortServers']);
        $model->setSortPlayers($serverRow['sortPlayers']);
        $model->setCacheTime($serverRow['cacheTime']);
        $model->setLiveTime($serverRow['liveTime']);
        $model->setTimeOut($serverRow['timeOut']);
        $model->setRetryOffline($serverRow['retryOffline']);
        $model->setHostToIp($serverRow['hostToIp']);
        $model->setZonePlayer($serverRow['zonePlayer']);
        $model->setZoneLineSize($serverRow['zoneLineSize']);
        $model->setZoneHeightLimit($serverRow['zoneHeightLimit']);
            
        return $model;
    }

    /**
     * Updates server config.
     *
     * @param ServerModel $settings
     */
    public function updateServerConfig(SettingsModel $settings)
    {
        $this->db()->update('gameserver_config')
            ->values(['id' => '1', 
                      'showLocation' => $settings->getShowLocation(),
                      'fixLocation' => $settings->getFixLocation(),
                      'sortServers' => $settings->getSortServers(), 
                      'sortPlayers' => $settings->getSortPlayers(), 
                      'cacheTime' => $settings->getCacheTime(), 
                      'liveTime' => $settings->getLiveTime(), 
                      'timeOut' => $settings->getTimeOut(), 
                      'retryOffline' => $settings->getRetryOffline(), 
                      'hostToIp' => $settings->getHostToIp(),
                      'zonePlayer' => $settings->getZonePlayer(), 
                      'zoneLineSize' => $settings->getZoneLineSize(), 
                      'zoneHeightLimit' => $settings->getZoneHeightLimit()])
            ->where(['id' => '1'])
            ->execute();
        $this->db()->update('gameserver')
            ->values(['cache_time' => '', 'cache' => ''])
            ->execute();
    }

}
