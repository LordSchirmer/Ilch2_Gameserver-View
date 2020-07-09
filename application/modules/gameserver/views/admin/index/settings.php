<h1><?=$this->getTrans('settingServers') ?></h1>
<form class="form-horizontal" method="POST">
    <?=$this->getTokenField() ?>
    
    <legend><?=$this->getTrans('locations') ?></legend>
    <div class="form-group <?=$this->validation()->hasError('showLocation') ? 'has-error' : '' ?>">
        <label for="showLocation" class="col-lg-2 control-label">
            <?=$this->getTrans('showLocation') ?>:
        </label>
        <div class="col-lg-2">
            <div class="flipswitch">
                <input type="radio" class="flipswitch-input" id="showLocation-on" name="showLocation" value="1" <?=($this->get('settings')->getShowLocation() == '1') ? 'checked="checked"' : '' ?> />
                <label for="showLocation-on" class="flipswitch-label flipswitch-label-on"><?=$this->getTrans('on') ?></label>
                <input type="radio" class="flipswitch-input" id="showLocation-off" name="showLocation" value="0" <?=($this->get('settings')->getShowLocation() != '1') ? 'checked="checked"' : '' ?> />
                <label for="showLocation-off" class="flipswitch-label flipswitch-label-off"><?=$this->getTrans('off') ?></label>
                <span class="flipswitch-selection"></span>
            </div>
        </div>
        <div class="col-lg-6 alert alert-info">
            <strong><?=$this->getTrans('info') ?></strong> <?=$this->getTrans('infoShowLocation') ?>
        </div>
    </div>

    <div class="form-group <?=$this->validation()->hasError('fixLocation') ? 'has-error' : '' ?>">
        <label for="fixLocation" class="col-lg-2 control-label">
            <?=$this->getTrans('fixLocation') ?>:
        </label>
        <div class="col-lg-2">
            <select name="fixLocation"
                    class="form-control"
                    id="fixLocation">
            <?php
            $listlocations = array();
            $o = opendir(APPLICATION_PATH.'/modules/gameserver/static/locations');
            while ($f = readdir($o)) {
                if ($f !== '.' && $f !== '..') {
                    $listlocations[$f] = str_replace('.png','',$f);
                }
            }
            asort($listlocations);
            ?>
            <option value=""></option>
            <?php foreach($listlocations as $key => $value) {
                $selected = ($this->get('settings')->getFixLocation() == $value)?' selected':'';
                echo '<option value="'.$value.'"'.$selected.'>'.$value.'</option>';
            } ?>
            </select>
        </div>
        <div class="col-lg-6 alert alert-info">
            <strong><?=$this->getTrans('info') ?></strong> <?=$this->getTrans('infoFixLocation') ?>
        </div>
    </div>

    <legend><?=$this->getTrans('sortings') ?></legend>
    <div class="form-group <?=$this->validation()->hasError('sortServers') ? 'has-error' : '' ?>">
        <label for="sortServers" class="col-lg-2 control-label">
            <?=$this->getTrans('sortServers') ?>:
        </label>
        <div class="col-lg-2">
            <select name="sortServers"
                    class="form-control"
                    id="sortServers">
            <?php $listsortserver = array('pos' => 'Eigene Sortierung', 'type' => 'Servertyp', 'players' => 'Spieleranzahl', 'status' => 'Status'); ?>
            <?php foreach($listsortserver as $key => $value) {
                $selected = ($this->get('settings')->getSortServers() == $key)?' selected':'';
                echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
            } ?>
            </select>
        </div>
    </div>

    <div class="form-group <?=$this->validation()->hasError('sortPlayers') ? 'has-error' : '' ?>">
        <label for="sortPlayers" class="col-lg-2 control-label">
            <?=$this->getTrans('sortPlayers') ?>:
        </label>
        <div class="col-lg-2">
            <select name="sortPlayers"
                    class="form-control"
                    id="sortPlayers">
            <?php $listsortplayer = array('name' => 'Spielername', 'score' => 'Ergebnis'); ?>
            <?php foreach($listsortplayer as $key => $value) {
                $selected = ($this->get('settings')->getSortPlayers() == $key)?' selected':'';
                echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
            } ?>
            </select>
        </div>
    </div>

    <legend><?=$this->getTrans('server') ?></legend>
    <div class="form-group <?=$this->validation()->hasError('cacheTime') ? 'has-error' : '' ?>">
        <label for="cacheTime" class="col-lg-2 control-label">
            <?=$this->getTrans('cacheTime') ?>:
        </label>
        <div class="col-lg-2">
            <input type="number"
                   class="form-control"
                   id="cacheTime"
                   name="cacheTime"
                   value="<?=$this->get('settings')->getCacheTime() ?>" />
        </div>
        <div class="col-lg-6 alert alert-info">
            <strong><?=$this->getTrans('info') ?></strong> <?=$this->getTrans('infoCacheTime') ?>
        </div>
    </div>

    <div class="form-group <?=$this->validation()->hasError('liveTime') ? 'has-error' : '' ?>">
        <label for="liveTime" class="col-lg-2 control-label">
            <?=$this->getTrans('liveTime') ?>:
        </label>
        <div class="col-lg-2">
            <input type="number"
                   class="form-control"
                   id="liveTime"
                   name="liveTime"
                   value="<?=$this->get('settings')->getLiveTime() ?>" />
        </div>
        <div class="col-lg-6 alert alert-info">
            <strong><?=$this->getTrans('info') ?></strong> <?=$this->getTrans('infoLiveTime') ?>
        </div>
    </div>
    
    <div class="form-group <?=$this->validation()->hasError('timeOut') ? 'has-error' : '' ?>">
        <label for="timeOut" class="col-lg-2 control-label">
            <?=$this->getTrans('timeOut') ?>:
        </label>
        <div class="col-lg-2">
            <div class="flipswitch">
                <input type="radio" class="flipswitch-input" id="timeOut-on" name="timeOut" value="1" <?=($this->get('settings')->getTimeOut() == '1') ? 'checked="checked"' : '' ?> />
                <label for="timeOut-on" class="flipswitch-label flipswitch-label-on"><?=$this->getTrans('on') ?></label>
                <input type="radio" class="flipswitch-input" id="timeOut-off" name="timeOut" value="0" <?=($this->get('settings')->getTimeOut() != '1') ?'checked="checked"' : '' ?> />
                <label for="timeOut-off" class="flipswitch-label flipswitch-label-off"><?=$this->getTrans('off') ?></label>
                <span class="flipswitch-selection"></span>
            </div>
        </div>
        <div class="col-lg-6 alert alert-info">
            <strong><?=$this->getTrans('info') ?></strong> <?=$this->getTrans('infoTimeOut') ?>
        </div>
    </div>

    <div class="form-group <?=$this->validation()->hasError('retryOffline') ? 'has-error' : '' ?>">
        <label for="retryOffline" class="col-lg-2 control-label">
            <?=$this->getTrans('retryOffline') ?>:
        </label>
        <div class="col-lg-2">
            <div class="flipswitch">
                <input type="radio" class="flipswitch-input" id="retryOffline-on" name="retryOffline" value="1" <?=($this->get('settings')->getRetryOffline() == '1') ? 'checked="checked"' : '' ?> />
                <label for="retryOffline-on" class="flipswitch-label flipswitch-label-on"><?=$this->getTrans('on') ?></label>
                <input type="radio" class="flipswitch-input" id="retryOffline-off" name="retryOffline" value="0" <?=($this->get('settings')->getRetryOffline() != '1') ? 'checked="checked"' : '' ?> />
                <label for="retryOffline-off" class="flipswitch-label flipswitch-label-off"><?=$this->getTrans('off') ?></label>
                <span class="flipswitch-selection"></span>
            </div>
        </div>
        <div class="col-lg-6 alert alert-info">
            <strong><?=$this->getTrans('info') ?></strong> <?=$this->getTrans('infoRetryOffline') ?>
        </div>
    </div>
    
    <div class="form-group <?=$this->validation()->hasError('hostToIp') ? 'has-error' : '' ?>">
        <label for="hostToIp" class="col-lg-2 control-label">
            <?=$this->getTrans('hostToIp') ?>:
        </label>
        <div class="col-lg-2">
            <div class="flipswitch">
                <input type="radio" class="flipswitch-input" id="hostToIp-on" name="hostToIp" value="1" <?=($this->get('settings')->getHostToIp() == '1') ? 'checked="checked"' : '' ?> />
                <label for="hostToIp-on" class="flipswitch-label flipswitch-label-on"><?=$this->getTrans('on') ?></label>
                <input type="radio" class="flipswitch-input" id="hostToIp-off" name="hostToIp" value="0" <?=($this->get('settings')->getHostToIp() != '1') ? 'checked="checked"' : '' ?> />
                <label for="hostToIp-off" class="flipswitch-label flipswitch-label-off"><?=$this->getTrans('off') ?></label>
                <span class="flipswitch-selection"></span>
            </div>
        </div>
        <div class="col-lg-6 alert alert-info">
            <strong><?=$this->getTrans('info') ?></strong> <?=$this->getTrans('infoHostToIp') ?>
        </div>
    </div>

    <legend><?=$this->getTrans('boxen') ?></legend>
    <div class="form-group <?=$this->validation()->hasError('zonePlayer') ? 'has-error' : '' ?>">
        <label for="zonePlayer" class="col-lg-2 control-label">
            <?=$this->getTrans('zonePlayer') ?>:
        </label>
        <div class="col-lg-2">
            <div class="flipswitch">
                <input type="radio" class="flipswitch-input" id="zonePlayer-on" name="zonePlayer" value="1" <?=($this->get('settings')->getZonePlayer() == '1') ? 'checked="checked"' : '' ?> />
                <label for="zonePlayer-on" class="flipswitch-label flipswitch-label-on"><?=$this->getTrans('on') ?></label>
                <input type="radio" class="flipswitch-input" id="zonePlayer-off" name="zonePlayer" value="0" <?=($this->get('settings')->getZonePlayer() != '1') ? 'checked="checked"' : '' ?> />
                <label for="zonePlayer-off" class="flipswitch-label flipswitch-label-off"><?=$this->getTrans('off') ?></label>
                <span class="flipswitch-selection"></span>
            </div>
        </div>
        <div class="col-lg-6 alert alert-info">
            <strong><?=$this->getTrans('info') ?></strong> <?=$this->getTrans('infoZonePlayer') ?>
        </div>
    </div>
    
    <div class="form-group <?=$this->validation()->hasError('zoneLineSize') ? 'has-error' : '' ?>">
        <label for="zoneLineSize" class="col-lg-2 control-label">
            <?=$this->getTrans('zoneLineSize') ?>:
        </label>
        <div class="col-lg-2">
            <input type="number"
                   class="form-control"
                   id="zoneLineSize"
                   name="zoneLineSize"
                   value="<?=$this->get('settings')->getZoneLineSize() ?>" />
        </div>
        <div class="col-lg-6 alert alert-info">
            <strong><?=$this->getTrans('info') ?></strong> <?=$this->getTrans('infoZoneLineSize') ?>
        </div>
    </div>

    <div class="form-group <?=$this->validation()->hasError('zoneHeightLimit') ? 'has-error' : '' ?>">
        <label for="zoneHeightLimit" class="col-lg-2 control-label">
            <?=$this->getTrans('zoneHeightLimit') ?>:
        </label>
        <div class="col-lg-2">
            <input type="number"
                   class="form-control"
                   id="zoneHeightLimit"
                   name="zoneHeightLimit"
                   value="<?=$this->get('settings')->getZoneHeightLimit() ?>" />
        </div>
        <div class="col-lg-6 alert alert-info">
            <strong><?=$this->getTrans('info') ?></strong> <?=$this->getTrans('infoZoneHeightLimit') ?>
        </div>
    </div>

    <?=$this->getSaveBar('saveButton') ?>
</form>
