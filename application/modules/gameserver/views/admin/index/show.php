<h1>
    <?php
    if ($this->get('server') != '') {
        echo $this->getTrans('edit');
    } else {
        echo $this->getTrans('add');
    }
    ?>
</h1>
<form class="form-horizontal" method="POST">
    <?=$this->getTokenField() ?>
    <div class="form-group <?=$this->validation()->hasError('type') ? 'has-error' : '' ?>">
        <label for="type" class="col-lg-2 control-label">
            <?=$this->getTrans('type') ?>:
        </label>
        <div class="col-lg-2">
            <select name="type"
                    class="form-control"
                    id="type" />
            <option value=""><?=$this->getTrans('select') ?></option>
            <?php $lgsl_type_list = lgsl_type_list(); unset($lgsl_type_list['test']); asort($lgsl_type_list); ?>
            <?php foreach($lgsl_type_list as $key => $value) {
                $selected=($this->get('server') != '' AND $key == $this->escape($this->get('server')->getType())) ? " selected" : "";
                echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
            } ?>
            </select>
        </div>
    </div>
    <div class="form-group <?=$this->validation()->hasError('ip') ? 'has-error' : '' ?>">
        <label for="ip" class="col-lg-2 control-label">
            <?=$this->getTrans('ip') ?>:
        </label>
        <div class="col-lg-2">
            <input type="ip"
                   class="form-control"
                   id="ip"
                   name="ip"
                   value="<?php if ($this->get('server') != '') { echo $this->escape($this->get('server')->getIp()); } else { echo $this->escape($this->originalInput('ip')); } ?>" />
        </div>
    </div>
    <div class="form-group <?=$this->validation()->hasError('c_port') ? 'has-error' : '' ?>">
        <label for="c_port" class="col-lg-2 control-label">
            <?=$this->getTrans('c_port') ?>:
        </label>
        <div class="col-lg-2">
            <input type="c_port"
                   class="form-control"
                   id="c_port"
                   name="c_port"
                   value="<?php if ($this->get('server') != '') { echo $this->escape($this->get('server')->getC_port()); } else { echo $this->escape($this->originalInput('c_port')); } ?>" />
        </div>
    </div>
    <div class="form-group <?=$this->validation()->hasError('q_port') ? 'has-error' : '' ?>">
        <label for="q_port" class="col-lg-2 control-label">
            <?=$this->getTrans('q_port') ?>:
        </label>
        <div class="col-lg-2">
            <input type="q_port"
                   class="form-control"
                   id="q_port"
                   name="q_port"
                   value="<?php if ($this->get('server') != '') { echo $this->escape($this->get('server')->getQ_port()); } else { echo $this->escape($this->originalInput('q_port')); } ?>" />
        </div>
        <div class="col-lg-6 alert alert-info">
            <strong><?=$this->getTrans('info') ?></strong> <?=$this->getTrans('infoqport') ?>
        </div>
    </div>
    <div class="form-group <?=$this->validation()->hasError('s_port') ? 'has-error' : '' ?>">
        <label for="s_port" class="col-lg-2 control-label">
            <?=$this->getTrans('s_port') ?>:
        </label>
        <div class="col-lg-2">
            <input type="s_port"
                   class="form-control"
                   id="s_port"
                   name="s_port"
                   value="<?php if ($this->get('server') != '') { echo $this->escape($this->get('server')->getS_port()); } else { echo $this->escape($this->originalInput('s_port')); } ?>" />
        </div>
        <div class="col-lg-6 alert alert-info">
            <strong><?=$this->getTrans('info') ?></strong> <?=$this->getTrans('infosport') ?>
        </div>
    </div>
    <div class="form-group <?=$this->validation()->hasError('zone') ? 'has-error' : '' ?>">
        <label for="zone" class="col-lg-2 control-label">
            <?=$this->getTrans('zone') ?>:
        </label>
        <div class="col-lg-4">
            <div class="flipswitch">
                <?php if ($this->get('server') != '') { ?>
                    <input type="radio" class="flipswitch-input" id="zone-on" name="zone" value="0" <?php if ($this->escape($this->get('server')->getZone()) == '0') { echo 'checked="checked"'; } ?> />
                    <label for="zone-on" class="flipswitch-label flipswitch-label-on"><?=$this->getTrans('on') ?></label>
                    <input type="radio" class="flipswitch-input" id="zone-off" name="zone" value="1" <?php if ($this->escape($this->get('server')->getZone()) != '0') { echo 'checked="checked"'; } ?> />
                    <label for="zone-off" class="flipswitch-label flipswitch-label-off"><?=$this->getTrans('off') ?></label>
                    <span class="flipswitch-selection"></span>
                <?php } else { ?>
                    <input type="radio" class="flipswitch-input" id="zone-on" name="zone" value="0" />
                    <label for="zone-on" class="flipswitch-label flipswitch-label-on"><?=$this->getTrans('on') ?></label>
                    <input type="radio" class="flipswitch-input" id="zone-off" name="zone" value="1" <?php echo 'checked="checked"'; ?> />
                    <label for="zone-off" class="flipswitch-label flipswitch-label-off"><?=$this->getTrans('off') ?></label>
                    <span class="flipswitch-selection"></span>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="form-group <?=$this->validation()->hasError('disabled') ? 'has-error' : '' ?>">
        <label for="disabled" class="col-lg-2 control-label">
            <?=$this->getTrans('disabled') ?>:
        </label>
        <div class="col-lg-4">
            <div class="flipswitch">
                <?php if ($this->get('server') != '') { ?>
                    <input type="radio" class="flipswitch-input" id="disabled-on" name="disabled" value="0" <?php if ($this->escape($this->get('server')->getDisabled()) == '0') { echo 'checked="checked"'; } ?> />
                    <label for="disabled-on" class="flipswitch-label flipswitch-label-on"><?=$this->getTrans('on') ?></label>
                    <input type="radio" class="flipswitch-input" id="disabled-off" name="disabled" value="1" <?php if ($this->escape($this->get('server')->getDisabled()) != '0') { echo 'checked="checked"'; } ?> />
                    <label for="disabled-off" class="flipswitch-label flipswitch-label-off"><?=$this->getTrans('off') ?></label>
                    <span class="flipswitch-selection"></span>
                <?php } else { ?>
                    <input type="radio" class="flipswitch-input" id="disabled-on" name="disabled" value="0" <?php echo 'checked="checked"'; ?> />
                    <label for="disabled-on" class="flipswitch-label flipswitch-label-on"><?=$this->getTrans('on') ?></label>
                    <input type="radio" class="flipswitch-input" id="disabled-off" name="disabled" value="1" />
                    <label for="disabled-off" class="flipswitch-label flipswitch-label-off"><?=$this->getTrans('off') ?></label>
                    <span class="flipswitch-selection"></span>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="form-group <?=$this->validation()->hasError('comment') ? 'has-error' : '' ?>">
        <label for="comment" class="col-lg-2 control-label">
            <?=$this->getTrans('comment') ?>:
        </label>
        <div class="col-lg-2">
            <input type="comment"
                   class="form-control"
                   id="comment"
                   name="comment"
                   value="<?php if ($this->get('server') != '') { echo $this->escape($this->get('server')->getComment()); } else { echo $this->escape($this->originalInput('comment')); } ?>" />
        </div>
    </div>
    <?php
    if ($this->get('server') != '') {
        echo $this->getSaveBar('updateButton');
    } else {
        echo $this->getSaveBar('addButton');
    }
    ?>
</form>
