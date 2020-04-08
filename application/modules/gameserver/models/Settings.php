<?php
/**
 * @copyright Ilch 2
 * @package ilch
 */

namespace Modules\Gameserver\Models;

class Settings extends \Ilch\Model
{
    /**
     * The id of the serverconfig.
     *
     * @var int
     */
    protected $id;

    /**
     * The showLocation of the serverconfig.
     *
     * @var string
     */
    protected $showLocation;

    /**
     * The fixLocation of the serverconfig.
     *
     * @var string
     */
    protected $fixLocation;

    /**
     * The sortServers of the serverconfig.
     *
     * @var string
     */
    protected $sortServers;
    
    /**
     * The sortPlayers of the serverconfig.
     *
     * @var string
     */
    protected $sortPlayers;
    
    /**
     * The cacheTime of the serverconfig.
     *
     * @var string
     */
    protected $cacheTime;
    
    /**
     * The liveTime of the serverconfig.
     *
     * @var string
     */
    protected $liveTime;
    
    /**
     * The timeOut of the serverconfig.
     *
     * @var string
     */
    protected $timeOut;
    
    /**
     * The retryOffline of the serverconfig.
     *
     * @var string
     */
    protected $retryOffline;
    
    /**
     * The hostToIp of the serverconfig.
     *
     * @var string
     */
    protected $hostToIp;
    
    /**
     * The zonePlayer of the serverconfig.
     *
     * @var string
     */
    protected $zonePlayer;
    
    /**
     * The zoneLineSize of the serverconfig.
     *
     * @var string
     */
    protected $zoneLineSize;
    
    /**
     * The zoneHeightLimit of the serverconfig.
     *
     * @var string
     */
    protected $zoneHeightLimit;

    /**
     * Gets the id of the serverconfig.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the id of the serverconfig.
     *
     * @param int $id
     * @return this
     */    
    public function setId($id)
    {
        $this->id = (string)$id;

        return $id;
    }

    /**
     * Gets the showLocation of the serverconfig.
     *
     * @return int
     */
    public function getShowLocation()
    {
        return $this->showLocation;
    }
    
    /**
     * Sets the showLocation of the serverconfig.
     *
     * @param int $showLocation
     * @return this
     */
    public function setShowLocation($showLocation)
    {
        $this->showLocation = (string)$showLocation;

        return $showLocation;
    }

    /**
     * Gets the fixLocation of the serverconfig.
     *
     * @return string
     */
    public function getFixLocation()
    {
        return $this->fixLocation;
    }

    /**
     * Sets the fixLocation of the serverconfig.
     *
     * @param string $fixLocation
     * @return this
     */
    public function setFixLocation($fixLocation)
    {
        $this->fixLocation = (string)$fixLocation;

        return $fixLocation;
    }

    /**
     * Gets the sortServers of the serverconfig.
     *
     * @return string
     */
    public function getSortServers()
    {
        return $this->sortServers;
    }
    
    /**
     * Sets the sortServers of the serverconfig.
     *
     * @param string $sortServers
     * @return this
     */
    public function setSortServers($sortServers)
    {
        $this->sortServers = (string)$sortServers;

        return $sortServers;
    }

    /**
     * Gets the sortPlayers of the serverconfig.
     *
     * @return string
     */
    public function getSortPlayers()
    {
        return $this->sortPlayers;
    }

    /**
     * Sets the sortPlayers of the serverconfig.
     *
     * @param string $sortPlayers
     * @return this
     */
    public function setSortPlayers($sortPlayers)
    {
        $this->sortPlayers = (string)$sortPlayers;

        return $sortPlayers;
    }

    /**
     * Gets the cacheTime of the serverconfig.
     *
     * @return string
     */
    public function getCacheTime()
    {
        return $this->cacheTime;
    }
    
    /**
     * Sets the cacheTime of the serverconfig.
     *
     * @param string $cacheTime
     * @return this
     */
    public function setCacheTime($cacheTime)
    {
        $this->cacheTime = (string)$cacheTime;

        return $cacheTime;
    }

    /**
     * Gets the liveTime of the serverconfig.
     *
     * @return string
     */
    public function getLiveTime()
    {
        return $this->liveTime;
    }
    
    /**
     * Sets the liveTime of the serverconfig.
     *
     * @param string $liveTime
     * @return this
     */
    public function setLiveTime($liveTime)
    {
        $this->liveTime = (string)$liveTime;

        return $liveTime;
    }

    /**
     * Gets the timeOut of the serverconfig.
     *
     * @return int
     */
    public function getTimeOut()
    {
        return $this->timeOut;
    }

    /**
     * Sets the timeOut of the serverconfig.
     *
     * @param int $timeOut
     * @return this
     */    
    public function setTimeOut($timeOut)
    {
        $this->timeOut = (string)$timeOut;

        return $timeOut;
    }

    /**
     * Gets the retryOffline of the serverconfig.
     *
     * @return int
     */
    public function getRetryOffline()
    {
        return $this->retryOffline;
    }

    /**
     * Sets the retryOffline of the serverconfig.
     *
     * @param int $retryOffline
     * @return this
     */  
    public function setRetryOffline($retryOffline)
    {
        $this->retryOffline = (string)$retryOffline;

        return $retryOffline;
    }

    /**
     * Gets the hostToIp of the serverconfig.
     *
     * @return int
     */
    public function getHostToIp()
    {
        return $this->hostToIp;
    }

    /**
     * Sets the hostToIp of the serverconfig.
     *
     * @param int $hostToIp
     * @return this
     */ 
    public function setHostToIp($hostToIp)
    {
        $this->hostToIp = (string)$hostToIp;

        return $hostToIp;
    }

    /**
     * Gets the zonePlayer of the serverconfig.
     *
     * @return int
     */
    public function getZonePlayer()
    {
        return $this->zonePlayer;
    }

    /**
     * Sets the zonePlayer of the serverconfig.
     *
     * @param int $zonePlayer
     * @return this
     */ 
    public function setZonePlayer($zonePlayer)
    {
        $this->zonePlayer = (string)$zonePlayer;

        return $zonePlayer;
    }

    /**
     * Gets the zoneLineSize of the server.
     *
     * @return string
     */
    public function getZoneLineSize()
    {
        return $this->zoneLineSize;
    }

    /**
     * Sets the zoneLineSize of the server.
     *
     * @param string $zoneLineSize
     * @return this
     */
    public function setZoneLineSize($zoneLineSize)
    {
        $this->zoneLineSize = (string)$zoneLineSize;

        return $zoneLineSize;
    }

    /**
     * Gets the zoneHeightLimit of the server.
     *
     * @return string
     */
    public function getZoneHeightLimit()
    {
        return $this->zoneHeightLimit;
    }

    /**
     * Sets the zoneHeightLimit of the server.
     *
     * @param string $zoneHeightLimit
     * @return this
     */
    public function setZoneHeightLimit($zoneHeightLimit)
    {
        $this->zoneHeightLimit = (string)$zoneHeightLimit;

        return $zoneHeightLimit;
    }

}
