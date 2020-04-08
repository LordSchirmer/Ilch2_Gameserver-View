<?php
/**
 * @copyright Ilch 2
 * @package ilch
 */

namespace Modules\Gameserver\Models;

class Server extends \Ilch\Model
{
    /**
     * The id of the server.
     *
     * @var int
     */
    protected $id;

    /**
     * The id of the server.
     *
     * @var int
     */
    protected $pos;

    /**
     * The type of the server.
     *
     * @var string
     */
    protected $type;

    /**
     * The ip of the server.
     *
     * @var string
     */
    protected $ip;

    /**
     * The c_port of the server.
     *
     * @var string
     */
    protected $c_port;

    /**
     * The q_port of the server.
     *
     * @var string
     */
    protected $q_port;

    /**
     * The s_port of the server.
     *
     * @var string
     */
    protected $s_port;

    /**
     * The zone of the server.
     *
     * @var string
     */
    protected $zone;

    /**
     * The disabled of the server.
     *
     * @var string
     */
    protected $disabled;

    /**
     * The comment of the server.
     *
     * @var string
     */
    protected $comment;

    /**
     * The status of the server.
     *
     * @var string
     */
    protected $status;

    /**
     * The cache of the server.
     *
     * @var string
     */
    protected $cache;

    /**
     * The cache_time of the server.
     *
     * @var string
     */
    protected $cache_time;
    
    /**
     * The ServerIcon of the server.
     *
     * @var string
     */
    protected $serverIcon;
    
    /**
     * The ServerType of the server.
     *
     * @var string
     */
    protected $serverType;
    
    /**
     * Gets the id of the server.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the id of the server.
     *
     * @param int $id
     * @return this
     */
    public function setId($id)
    {
        $this->id = (int)$id;

        return $this;
    }

    /**
     * Gets the pos of the server.
     *
     * @return int
     */
    public function getPos()
    {
        return $this->pos;
    }

    /**
     * Sets the pos of the server.
     *
     * @param int $pos
     * @return this
     */
    public function setPos($pos)
    {
        $this->pos = (int)$pos;

        return $this;
    }

    /**
     * Gets the type of the server.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
 
    /**
     * Sets the type of the server.
     *
     * @param string $type
     * @return this
     */
    public function setType($type)
    {
        $this->type = (string)$type;

        return $this;
    }

    /**
     * Gets the ip of the server.
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Sets the ip of the server.
     *
     * @param string $ip
     * @return this
     */
    public function setIp($ip)
    {
        $this->ip = (string)$ip;

        return $this;
    }

    /**
     * Gets the c_port of the server.
     *
     * @return string
     */
    public function getC_port()
    {
        return $this->c_port;
    }

    /**
     * Sets the c_port of the server.
     *
     * @param string $c_port
     * @return this
     */
    public function setC_port($c_port)
    {
        $this->c_port = (string)$c_port;

        return $this;
    }

    /**
     * Gets the q_port of the server.
     *
     * @return string
     */
    public function getQ_port()
    {
        return $this->q_port;
    }

    /**
     * Sets the q_port of the server.
     *
     * @param string $q_port
     * @return this
     */
    public function setQ_port($q_port)
    {
        $this->q_port = (string)$q_port;

        return $this;
    }

    /**
     * Gets the s_port of the server.
     *
     * @return string
     */
    public function getS_port()
    {
        return $this->s_port;
    }

    /**
     * Sets the s_port of the server.
     *
     * @param string $s_port
     * @return this
     */
    public function setS_port($s_port)
    {
        $this->s_port = (string)$s_port;

        return $this;
    }

    /**
     * Gets the zone of the server.
     *
     * @return string
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Sets the zone of the server.
     *
     * @param string $zone
     * @return this
     */
    public function setZone($zone)
    {
        $this->zone = (string)$zone;

        return $this;
    }

    /**
     * Gets the disabled of the server.
     *
     * @return string
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * Sets the disabled of the server.
     *
     * @param string $disabled
     * @return this
     */
    public function setDisabled($disabled)
    {
        $this->disabled = (string)$disabled;

        return $this;
    }

    /**
     * Gets the comment of the server.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Sets the comment of the server.
     *
     * @param string $comment
     * @return this
     */
    public function setComment($comment)
    {
        $this->comment = (string)$comment;

        return $this;
    }

    /**
     * Gets the status of the server.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the status of the server.
     *
     * @param string $status
     * @return this
     */
    public function setStatus($status)
    {
        $this->status = (string)$status;

        return $this;
    }

    /**
     * Gets the cache of the server.
     *
     * @return string
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * Sets the cache of the server.
     *
     * @param string $cache
     * @return this
     */
    public function setCache($cache)
    {
        $this->cache = (string)$cache;

        return $this;
    }

    /**
     * Gets the cache_time of the server.
     *
     * @return string
     */
    public function getCache_time()
    {
        return $this->cache_time;
    }

    /**
     * Sets the cache_time of the server.
     *
     * @param string $cache_time
     * @return this
     */
    public function setCache_time($cache_time)
    {
        $this->cache_time = (string)$cache_time;

        return $cache_time;
    }
    
    /**
     * Gets the ServerIcon of the server.
     *
     * @return string
     */
    public function getServerIcon()
    {
        return $this->serverIcon;
    }

    /**
     * Sets the ServerIcon of the server.
     *
     * @param string $serverIcon
     * @return this
     */
    public function setServerIcon($serverIcon)
    {
        $this->serverIcon = (string)$serverIcon;

        return $serverIcon;
    }

    /**
     * Gets the ServerType of the server.
     *
     * @return string
     */
    public function getServerType()
    {
        return $this->serverType;
    }

    /**
     * Sets the ServerType of the server.
     *
     * @param string $serverIcon
     * @return this
     */
    public function setServerType($serverType)
    {
        $this->serverType = (string)$serverType;

        return $serverType;
    }

}
