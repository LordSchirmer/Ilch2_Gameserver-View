<link href="<?=$this->getModuleUrl('static/css/gameserver_admin.css') ?>" rel="stylesheet">
<h1>
    <?=$this->getTrans('manage') ?>
    <a class="badge" data-toggle="modal" data-target="#infoModal">
        <i class="fa fa-info"></i>
    </a>
</h1>
<?php if ($this->get('servers')): ?>
    <form class="form-horizontal" id="serverIndexForm" method="POST">
        <?=$this->getTokenField() ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <colgroup>
                    <col class="icon_width">
                    <col class="icon_width">
                    <col class="icon_width">
                    <col class="col-lg-2">
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col class="col-lg-2">
                    <col class="icon_width">
                </colgroup>
                <thead>
                    <tr>
                        <th><?=$this->getCheckAllCheckbox('check_servers') ?></th>
                        <th></th>
                        <th></th>
                        <th><?=$this->getTrans('type') ?></th>
                        <th><?=$this->getTrans('ip') ?></th>
                        <th><?=$this->getTrans('c_port') ?></th>
                        <th><?=$this->getTrans('q_port') ?></th>
                        <th><?=$this->getTrans('s_port') ?></th>
                        <th><?=$this->getTrans('zone') ?></th>
                        <th><?=$this->getTrans('disabled') ?></th>
                        <th><?=$this->getTrans('comment') ?></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="sortable">
                    <?php foreach ($this->get('servers') as $server): ?>
                        <tr id="<?=$this->escape($server->getId()) ?>">
                            <td><?=$this->getDeleteCheckbox('check_servers', $server->getId()) ?></td>
                            <td><?=$this->getEditIcon(['action' => 'show', 'id' => $server->getId()]) ?></td>
                            <td><?=$this->getDeleteIcon(['action' => 'delete', 'id' => $server->getId()]) ?></td>
                            <td><?=$this->escape(lgsl_type_list()[$server->getType()]) ?></td>                            
                            <td><?=$this->escape($server->getIp()) ?></td>
                            <td><?=$this->escape($server->getC_port()) ?></td>
                            <td><?=$this->escape($server->getQ_port()) ?></td>
                            <td><?=$this->escape($server->getS_port()) ?></td>
                            <td><?=($this->escape($server->getZone()) == '0') ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-ban text-danger"></i>' ?></td>
                            <td><?=($this->escape($server->getDisabled()) == '0') ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-ban text-danger"></i>' ?></td>
                            <td><?=$this->escape($server->getComment()) ?></td>
                            <td><i class="fas fa-arrows-alt-v"></i></td>
                        </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
            <input type="hidden" id="positions" name="positions" value="" />
        </div>
        <div class="content_savebox">
            <button type="submit" class="btn btn-default sortbtn" name="save" value="save">
                <?=$this->getTrans('saveSort') ?>
            </button>
            <input type="hidden" class="content_savebox_hidden" name="action" value="" />
            <div class="btn-group dropup">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <?=$this->getTrans('selected') ?> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu listChooser" role="menu">
                    <li><a href="#" data-hiddenkey="delete"><?=$this->getTrans('delete') ?></a></li>
                </ul>
            </div>
            <button type="submit" class="btn btn-default" name="delcache" value="delcache">
                <?=$this->getTrans('delCache') ?>
            </button>
        </div>
    </form>
    <script>
        $(function() {
            $('#sortable').sortable({
                opacity: .75,
                placeholder: 'placeholder',
                helper: function(e, tr) {
                    var $originals = tr.children();
                    var $helper = tr.clone();
                    $helper.children().each(function(index) {
                        $(this).width($originals.eq(index).width()+16);
                    });
                    return $helper;
                },
                update: function () {
                    $('.sortbtn').addClass('save_button');
                }
            });
            $('#sortable').disableSelection();
        });
        $('#serverIndexForm').submit (
            function() {
                var items = $('#sortable tr');
                var serverIDs = [items.length];
                var index = 1;
                items.each(
                    function(intIndex) {
                        serverIDs[index] = $(this).attr('id');
                        index++;
                    });
                $('#positions').val(serverIDs.join(","));
            }
        );
    </script>
<?php else: ?>
    <?=$this->getTrans('noServers') ?>
<?php endif; ?>

<?=$this->getDialog('infoModal', $this->getTrans('info'), $this->getTrans('serverInfoText')) ?>
