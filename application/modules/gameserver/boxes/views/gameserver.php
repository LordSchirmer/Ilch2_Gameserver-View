<link href="<?=$this->getBoxUrl('static/css/gameserver_box.css') ?>" rel="stylesheet">
<?php
require APPLICATION_PATH.'/modules/gameserver/static/lgsl/lgsl_class.php';

if ($this->get('server')):
    foreach ($this->get('server') as $key => $server):
        $server = lgsl_query_cached("", "", "", "", "", "", "sep", $server->getId());
        $server = lgsl_sort_players($server);
        $misc   = lgsl_server_misc($server);
        $server = lgsl_server_html($server);
        ?>
        
        <div class="box_container<?=($key==(count($this->get('server'))-1))?'_last':'' ?> gameserverbox">
            <table class="box_table" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <div class="box_info">
                            <small><?=$server['b']['ip'] ?>:<?=$server['b']['c_port'] ?></small>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td title="<?=$server['s']['name'] ?>">
                        <div class="box_info">
                          <?=$misc['name_filtered'] ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="box_image">
                            <a href="<?=BASE_URL.'/index.php/gameserver/index/show/id/'.$server['o']['id'] ?>">
                                <img class="image_map" alt="" src="<?=$misc['image_map'] ?>" title="<?=$this->getTrans('vsd') ?>"  />
                                <img class="image_password" alt="" src="<?=$misc['image_map_password'] ?>" title="<?=$this->getTrans('vsd') ?>"  />
                                <img class="image_game" alt="" src="<?=$misc['icon_game'] ?>" title="<?=$misc['name_type_game'] ?>"  />
                                <img class="image_location" alt="" src="<?=$misc['icon_location'] ?>" title="<?=$misc['text_location'] ?>"  />
                            </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td title="<?=$server['s']['map'] ?>">
                        <div class="box_info">
                            <?=$server['s']['map'] ?>
                        </div>
                    </td>
                </tr>
                <?php if ($server['p'] && $lgsl_config['zonePlayer']) {
                    $zone_height = $lgsl_config['zone']['line_size'] * (count($server['p']) + 2);
                    $zone_height = $zone_height > $lgsl_config['zone']['height'] ? $lgsl_config['zone']['height']."px" : $zone_height."px";
                ?>
                <tr>
                    <td class="box_player">
                        <div style="height:<?=$zone_height ?>">
                            <span class="left"><?=$this->getTrans('zpl') ?></span>
                            <span class="right"><?=$server['s']['players'] ?> / <?=$server['s']['playersmax'] ?></span>
                            <br /><br />
                            <?php foreach ($server['p'] as $player) { ?>
                                <div class="box_playerlist" title="<?=$player['name'] ?>"><?=$player['name'] ?></div>
                            <?php } ?>
                        </div>
                    </td>
                </tr>
                <?php } else { ?>
                <tr>
                    <td class="box_player">
                        <span class="left"><?=$this->getTrans('zpl') ?></span>
                        <span class="right"><?=$server['s']['players'] ?> / <?=$server['s']['playersmax'] ?></span>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    <?php
    endforeach;
else:
    echo $this->getTrans('noServers');
endif;
