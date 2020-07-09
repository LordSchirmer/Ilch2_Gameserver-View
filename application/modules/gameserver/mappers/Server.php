<?php
/**
 * @copyright Ilch 2
 * @package ilch
 */

namespace Modules\Gameserver\Mappers;

use Modules\Gameserver\Models\Server as ServerModel;

require APPLICATION_PATH.'/modules/gameserver/static/lgsl/lgsl_protocol.php';

/**
 * The server mapper class.
 *
 * @package ilch
 */
class Server extends \Ilch\Mapper
{
    /**
     * Gets servers.
     *
     * @return ServerModel[]|null
     */
    public function getServers($where = [])
    {
        $serverArray = $this->db()->select('*')
            ->from('gameserver')
            ->where($where)
            ->order(['pos' => 'ASC'])
            ->execute()
            ->fetchRows();

        if (empty($serverArray)) {
            return [];
        }

        $servers = [];
        foreach ($serverArray as $serverRow) {
          
            $serverModel = new serverModel();
            $serverModel->setId($serverRow['id'])
                ->setPos($serverRow['pos'])
                ->setType($serverRow['type'])
                ->setIp($serverRow['ip'])
                ->setC_port($serverRow['c_port'])
                ->setQ_port($serverRow['q_port'])
                ->setS_port($serverRow['s_port'])
                ->setZone($serverRow['zone'])
                ->setDisabled($serverRow['disabled'])
                ->setComment($serverRow['comment'])
                ->setStatus($serverRow['status'])
                ->setCache($serverRow['cache'])
                ->setCache_time($serverRow['cache_time']);
            $servers[] = $serverModel;
        }

        return $servers;
    }
    
    /**
     * Updates the position of a server in the database.
     *
     * @param int $id
     * @param int $position
     */
    public function updatePositionById($id, $position) {
        $this->db()->update('gameserver')
            ->values(['pos' => $position])
            ->where(['id' => $id])
            ->execute();
    }
    
    /**
     * Deletes the server chache in the database.
     *
     */
    public function deleteServerCache() {
        $this->db()->update('gameserver')
            ->values(['cache_time' => '', 'cache' => ''])
            ->execute();
    }

    /**
     * Gets server.
     *
     * @param integer $id
     * @return ServerModel|null
     */
    public function getServerById($id)
    {
        $serverRow = $this->db()->select('*')
            ->from('gameserver')
            ->where(['id' => (int)$this->db()->escape($id)])
            ->execute()
            ->fetchAssoc();

        if (empty($serverRow)) {
            return null;
        }

        $serverModel = new ServerModel();
        $serverModel->setId($serverRow['id'])
            ->setPos($serverRow['pos'])
            ->setType($serverRow['type'])
            ->setIp($serverRow['ip'])
            ->setC_port($serverRow['c_port'])
            ->setQ_port($serverRow['q_port'])
            ->setS_port($serverRow['s_port'])
            ->setZone($serverRow['zone'])
            ->setDisabled($serverRow['disabled'])
            ->setComment($serverRow['comment'])
            ->setStatus($serverRow['status'])
            ->setCache($serverRow['cache'])
            ->setCache_time($serverRow['cache_time']);
            
        return $serverModel;
    }

    /**
     * Gets server type.
     *
     * @param integer $id
     * @return ServerModel|null
     */
    public function getServerType($id)
    {
        $serverType = $this->db()->select('type')
            ->from('gameserver')
            ->where(['id' => $id])
            ->execute()
            ->fetchCell();

        if (empty($serverType)) {
            return null;
        }

        return lgsl_type_list()[$serverType];
    }

    /**
     * Inserts or updates server model.
     *
     * @param ServerModel $server
     */
    public function save(ServerModel $server)
    {
        if ($server->getId()) {
            $this->db()->update('gameserver')
                ->values(['type' => $server->getType(), 
                          'ip' => $server->getIp(), 
                          'c_port' => $server->getC_port(), 
                          'q_port' => $server->getQ_port(), 
                          's_port' => $server->getS_port(), 
                          'zone' => $server->getZone(), 
                          'disabled' => $server->getDisabled(), 
                          'comment' => $server->getComment(), 
                          'status' => $server->getStatus(), 
                          'cache' => '', 
                          'cache_time' => ''])
                ->where(['id' => $server->getId()])
                ->execute();
        } else {
            $maxPos = $this->db()->select('MAX(pos)')
                      ->from('gameserver')
                      ->execute()
                      ->fetchCell();
            
            $this->db()->insert('gameserver')
                ->values(['pos' => $maxPos+1,
                          'type' => $server->getType(), 
                          'ip' => $server->getIp(), 
                          'c_port' => $server->getC_port(), 
                          'q_port' => $server->getQ_port(), 
                          's_port' => $server->getS_port(), 
                          'zone' => $server->getZone(), 
                          'disabled' => $server->getDisabled(), 
                          'comment' => $server->getComment(), 
                          'status' => $server->getStatus(), 
                          'cache' => $server->getCache(), 
                          'cache_time' => $server->getCache_time()])
                ->execute();
        }
    }

    /**
     * Deletes server with given id.
     *
     * @param integer $id
     */
    public function delete($id)
    {
        $this->db()->delete('gameserver')
            ->where(['id' => $id])
            ->execute();
    }

}
