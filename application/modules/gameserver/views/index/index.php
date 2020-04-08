<?php 
require APPLICATION_PATH.'/modules/gameserver/static/lgsl/lgsl_class.php';
$server_list = lgsl_query_group();
$server_list = lgsl_sort_servers($server_list);
?>

<h1><?=$this->getTrans('menuGameserver') ?></h1>

<div class="table-responsive gameserver">
    <table class="table table-hover table-striped">
        <colgroup>
            <col class="col-lg-1">
            <col>
            <col>
            <col>
        </colgroup>
        <thead>
            <tr>
                <th colspan="2"><?=$this->getTrans('serverinfo') ?></th>
                <th><?=$this->getTrans('map') ?></th>                 
                <th><?=$this->getTrans('user') ?></th>           
            </tr>
        </thead>
        <tbody>
            <?php if ($server_list): ?>
                <?php foreach ($server_list as $server):
                    $misc   = lgsl_server_misc($server);
                    $server = lgsl_server_html($server); ?>
                    <tr>
                        <td class="middle">
                            <a href="<?=BASE_URL.'/index.php/gameserver/index/show/id/'.$server['o']['id'] ?>" title="<?=$this->getTrans('vsd') ?>">
                                <img class="list_image_map" src="<?=$misc['image_map'] ?>" alt="<?=$server['s']['map'] ?>" style="vertical-align: bottom;" />
                            </a>
                        </td>
                        <td class="vertical">
                            <strong><?=$misc['name_filtered'] ?></strong><br />
                            <?=$misc['name_type_game'] ?><br />
                            <?=$server['b']['ip'] ?>:<?=$server['b']['c_port'] ?><br />
                            <img class="list_icons game_icon" src="<?=$misc['icon_game'] ?>" title="<?=$misc['name_type_game'] ?>" alt="<?=$misc['name_type_game'] ?>" />
                            <span class="list_icons status_icon_<?=$misc['text_status'] ?>" title="<?=$this->getTrans($misc['text_status']) ?>"></span>
                            <img class="list_icons country_icon" src="<?=$misc['icon_location'] ?>" title="<?=$misc['text_location'] ?>" alt="<?=$misc['text_location'] ?>" />
                            <a class="list_icons details_icon" href="<?=BASE_URL.'/index.php/gameserver/index/show/id/'.$server['o']['id'] ?>" title="<?=$this->getTrans('vsd') ?>"></a>
                        </td>
                        <td>
                            <?=$server['s']['map'] ?>
                        </td>
                        <td>
                            <?=$server['s']['players'] ?> / <?=$server['s']['playersmax'] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                    <tr>
                        <td colspan="4"><?=$this->getTrans('noServers') ?></td>
                    </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
