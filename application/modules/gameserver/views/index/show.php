<?php 
require APPLICATION_PATH.'/modules/gameserver/static/lgsl/lgsl_class.php';
global $lgsl_server_id;
$id               = ($this->getRequest()->getParam('id')) ?: '0';
$server           = lgsl_query_cached("", "", "", "", "", "", "sep", $id);
if ($server): 
    $site_title   = $server['s']['name'];
    $fields_show  = array("name", "score", "kills", "deaths", "team", "ping", "bot", "time");
    $fields_hide  = array("teamindex", "pid", "pbguid");
    $fields_other = TRUE;
    $fields       = lgsl_sort_fields($server, $fields_show, $fields_hide, $fields_other);
    $server       = lgsl_sort_players($server);
    $server       = lgsl_sort_extras($server);
    $misc         = lgsl_server_misc($server);
    $server       = lgsl_server_html($server);
else:
    $site_title   = 'Fehler';
endif; 
?>

<h1><?=$site_title ?></h1>

<div class="table-responsive gameserver">
    <?php if ($server): ?>
    <details open>
        <summary>
            <h4><i class="fas fa-desktop"></i> <?=$this->getTrans('overview') ?><span></span></h4>
        </summary>
        <table class="table table-borderless">
            <tr>
                <td>
                    <div class="col-lg-3 cont_image">
                        <div class="gameimage">
                            <img id="image_map" src="<?=$misc['image_map'] ?>" alt="<?=$server['s']['map'] ?>" />
                            <img id="icon_password" src="<?=$misc['image_map_password'] ?>" alt=""	/>
                            <img id="icon_game" src="<?=$misc['icon_game'] ?>" title="<?=$misc['name_type_game'] ?>" />
                            <img id="icon_location" src="<?=$misc['icon_location'] ?>" title="<?=$misc['text_location'] ?>" />
                        </div>
                        <?=$server['s']['map'] ?>
                    </div>             
                    <div class="col-lg-5">
                        <table class="table info">
                            <tr>
                                <th><?=$this->getTrans('sts') ?>:</th>
                                <td><?=$this->getTrans($misc['text_status']) ?></td>
                            </tr>
                            <tr>
                                <th><?=$this->getTrans('adr') ?>:</th>
                                <td><?=$server['b']['ip'] ?></td>
                            </tr>
                            <tr>
                                <th><?=$this->getTrans('cpt') ?>:</th>
                                <td><?=$server['b']['c_port'] ?></td>
                            </tr>
                            <tr>
                                <th><?=$this->getTrans('qpt') ?>:</th>
                                <td><?=$server['b']['q_port'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-4">
                        <table class="table info">
                            <tr>
                                <th><?=$this->getTrans('gme') ?>:</th>
                                <td><?=$server['s']['game'] ?></td>
                            </tr>
                            <tr>
                                <th><?=$this->getTrans('typ') ?>:</th>
                                <td><?=$server['b']['type'] ?></td>
                            </tr>
                            <tr>
                                <th><?=$this->getTrans('plr') ?>:</th>
                                <td><?=$server['s']['players'] ?> / <?=$server['s']['playersmax'] ?></td>
                            </tr>
                            <tr>
                                <th><?=$this->getTrans('slk') ?>:</th>
                                <td><a href="<?=$misc['software_link'] ?>"><?=$this->getTrans('lik') ?></a></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </details>
    <details open>
        <summary>
            <h4><i class="fas fa-users"></i> <?=$this->getTrans('userinfo') ?><span></span></h4>
        </summary>
            <table class="table table-striped">
                <?php if (empty($server['p']) || !is_array($server['p'])) { ?>
                <tr>
                    <th><?=$this->getTrans('npi') ?></th>
                </tr>
                <?php } else { ?>
                <tr>
                <?php foreach ($fields as $field) { ?> <th><?=ucfirst($field) ?></th> <?php } ?>
                </tr>
                <?php foreach ($server['p'] as $player_key => $player) { ?>
                <tr>
                <?php foreach ($fields as $field) { ?> <td><?=$player[$field] ?></td> <?php } ?>
                </tr>
                <?php } } ?>
            </table>
    </details>
    <details>
        <summary>
            <h4><i class="fas fa-server"></i> <?=$this->getTrans('serverconfig') ?><span></span></h4>
        </summary>
            <table class="table table-striped">
            <?php if (empty($server['e']) || !is_array($server['e'])) { ?>
                <tr>
                    <th><?=$this->getTrans('nei') ?></th>
                </tr>
            <?php } else { ?>
                <tr>
                    <th><?=$this->getTrans('ehs') ?></th>
                    <th><?=$this->getTrans('ehv') ?></th>
                </tr>
                <?php foreach ($server['e'] as $field => $value) { ?>
                <tr>
                    <td><?=$field ?></td>
                    <td><?=$value ?></td>
                </tr>
                <?php } } ?>
            </table>
    </details>
    <?php else: ?>
    <table class="table table-striped">
        <colgroup>
            <col>
        </colgroup>
        <tr>
            <th><?=$this->getTrans('mid') ?></th>          
        </tr>
        <tr>
            <td><a href="<?=$this->getUrl(['action' => 'index']) ?>" title="zurück"><?=$this->getTrans('bak') ?></a></td>
        </tr>
    </table>
    <?php endif; ?>
</div>
