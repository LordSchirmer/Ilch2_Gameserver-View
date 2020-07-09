<?php
/**
 * @copyright Ilch 2
 * @package ilch
 */

namespace Modules\Gameserver\Config;

class Config extends \Ilch\Config\Install
{
    public $config = [
        'key' => 'gameserver',
        'version' => '1.0.1',
        'icon_small' => 'fa-server',
        'author' => 'Lord|Schirmer',
        'link' => 'https://www.ilch.de/',
        'languages' => [
            'de_DE' => [
                'name' => 'Gameserver (LGSL)',
                'description' => 'Hier können Gameserver hinzugef&uuml;gt werden. Angepasst auf Basis von LGSL by Richard Perry | v 5.10.1 | www.greycube.com',
            ],
            'en_EN' => [
                'name' => 'Gameserver (LGSL)',
                'description' => 'Here you can manage your Gameserver. Adapted based on LGSL by Richard Perry | v 5.10.1 | www.greycube.com',
            ],
        ],
        'boxes' => [
            'gameserver' => [
                'de_DE' => [
                    'name' => 'Gameserver'
                ],
                'en_EN' => [
                    'name' => 'Gameserver'
                ]
            ]
        ],
        'ilchCore' => '2.1.31',
        'phpVersion' => '7.0'
    ];

    public function install()
    {
        $this->db()->queryMulti($this->getInstallSql());
    }

    public function getInstallSql()
    {
        return "CREATE TABLE IF NOT EXISTS `[prefix]_gameserver` (
                    `id` INT(11) NOT NULL AUTO_INCREMENT,
                    `pos` INT(11) NOT NULL,
                    `type` VARCHAR(50) NOT NULL DEFAULT '',
                    `ip` VARCHAR(255) NOT NULL DEFAULT '',
                    `c_port` VARCHAR(5) NOT NULL DEFAULT '0',
                    `q_port` VARCHAR(5) NOT NULL DEFAULT '0',
                    `s_port` VARCHAR(5) NOT NULL DEFAULT '0',
                    `zone` VARCHAR(255) NOT NULL DEFAULT '',
                    `disabled` TINYINT(1) NOT NULL DEFAULT '0',
                    `comment` VARCHAR(255) NOT NULL DEFAULT '',
                    `status` TINYINT(1) NOT NULL DEFAULT '0',
                    `cache` TEXT NOT NULL,
                    `cache_time` TEXT NOT NULL,
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;
                
                CREATE TABLE IF NOT EXISTS `[prefix]_gameserver_config` (
                    `id` INT(11) NOT NULL AUTO_INCREMENT,
                    `showLocation` TINYINT(1) NOT NULL,
                    `fixLocation` VARCHAR(2) NOT NULL,
                    `sortServers` VARCHAR(50) NOT NULL,
                    `sortPlayers` VARCHAR(50) NOT NULL,
                    `cacheTime` INT(50) NOT NULL,
                    `liveTime` INT(50) NOT NULL,
                    `timeOut` TINYINT(1) NOT NULL,
                    `retryOffline` TINYINT(1) NOT NULL,
                    `hostToIp` TINYINT(1) NOT NULL,
                    `zonePlayer` TINYINT(1) NOT NULL,
                    `zoneLineSize` INT(50) NOT NULL,
                    `zoneHeightLimit` INT(50) NOT NULL,
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;
                
                INSERT INTO `[prefix]_gameserver_config`
                    (`id`,`showLocation`,`sortServers`,`sortPlayers`,`cacheTime`,`liveTime`,
                     `timeOut`,`retryOffline`,`hostToIp`,`zonePlayer`,`zoneLineSize`,`zoneHeightLimit`) 
                VALUES 
                    ('1','1','pos','name','60','3','0','0','1','0','19','100');

                INSERT INTO `[prefix]_gameserver`
                    (`id`,`pos`,`type`,`ip`,`c_port`,`q_port`,`zone`,`disabled`,`comment`) 
                VALUES 
                    ('1','1','ts3','85.25.129.11','9987','10011','1','0','Testserver 1'),
                    ('2','2','callofduty2','54.38.219.143','28960','28960','1','0','Testserver 2'),                 
                    ('3','3','callofduty4','209.58.164.107','28960','28960','1','0','Testserver 3');";
    }

    public function uninstall()
    {
        $this->db()->queryMulti("DROP TABLE `[prefix]_gameserver`");
        $this->db()->queryMulti("DROP TABLE `[prefix]_gameserver_config`");
        $this->db()->queryMulti("DELETE FROM `[prefix]_modules` WHERE `key` = 'gameserver'");
        $this->db()->queryMulti("DELETE FROM `[prefix]_modules_content` WHERE `key` = 'gameserver'");
    }

    public function getUpdate($installedVersion)
    {

    }
}
