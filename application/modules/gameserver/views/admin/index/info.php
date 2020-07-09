<link href="<?=$this->getModuleUrl('static/css/gameserver_admin.css') ?>" rel="stylesheet">
<h1>
    <?=$this->getTrans('infoServers') ?>
</h1>

<legend><?=$this->getTrans('phpfunctions') ?></legend>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <colgroup>
            <col class="col-lg-2">
            <col class="col-lg-1">
            <col>
        </colgroup>
        <thead>
            <tr>
                <th>Funktion</th>
                <th>Aktiviert</th>
                <th>Information</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><a target="_blank" href="https://www.php.net/fsockopen">FSOCKOPEN</a></th>
                <td><?=function_exists("fsockopen") ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-ban text-danger"></i>' ?></td>
                <td><?=$this->getTrans('infofsockopen') ?></td>
            </tr>
            <tr>
                <th><a target="_blank" href="https://www.php.net/curl">CURL</a></th>
                <td><?=function_exists("curl_init") && function_exists("curl_setopt") && function_exists("curl_exec") ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-ban text-danger"></i>' ?></td>
                <td><?=$this->getTrans('infocurl') ?></td>
            </tr>
            <tr>
                <th><a target="_blank" href="https://www.php.net/mbstring">MBSTRING</a></th>
                <td><?=function_exists("mb_convert_encoding") ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-ban text-danger"></i>' ?></td>
                <td><?=$this->getTrans('infomb') ?></td>
            </tr>
            <tr>
                <th><a target="_blank" href="https://www.php.net/bzip2">BZIP2</a></th>
                <td><?=function_exists("bzdecompress") ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-ban text-danger"></i>' ?></td>
                <td><?=$this->getTrans('infobz') ?></td>
            </tr>
            <tr>
                <th><a target="_blank" href="https://www.php.net/zlib">ZLIB</a></th>
                <td><?=function_exists("gzuncompress") ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-ban text-danger"></i>' ?></td>
                <td><?=$this->getTrans('infogz') ?></td>
            </tr>
        </tbody>
    </table>
</div>

<legend><?=$this->getTrans('choosinggametype') ?></legend>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <colgroup>
            <col class="col-lg-2">
            <col>
        </colgroup>
        <thead>
            <tr>
                <th>Gametype</th>
                <th>Auswahl</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>7 Days To Die</th>
                <td>Source Protocol ( Half-Life 2, etc. )</td>
            </tr>
            <tr>
                <th>Ark Survival Envolved</th>
                <td>Source Protocol ( Half-Life 2, etc. )</td>
            </tr>
            <tr>
                <th>Counter-Strike 1.6</th>
                <td>Half-Life - Steam Protocol</td>
            </tr>
            <tr>
                <th>Counter-Strike: Global Offensive</th>
                <td>Source Protocol ( Half-Life 2, etc. )</td>
            </tr>
            <tr>
                <th>DayZ Standalone</th>
                <td>Source Protocol ( Half-Life 2, etc. ) or Arma 3</td>
            </tr>
            <tr>
                <th>Garry's Mod</th>
                <td>Source Protocol ( Half-Life 2, etc. )</td>
            </tr>
            <tr>
                <th>Killing Floor 2</th>
                <td>Source Protocol ( Half-Life 2, etc. )</td>
            </tr>
            <tr>
                <th>Project Zomboid</th>
                <td>Source Protocol ( Half-Life 2, etc. )</td>
            </tr>
            <tr>
                <th>Rust</th>
                <td>Source Protocol ( Half-Life 2, etc. )</td>
            </tr>
            <tr>
                <th>Space Engineers</th>
                <td>Source Protocol ( Half-Life 2, etc. )</td>
            </tr>
            <tr>
                <th>Unturned</th>
                <td>Source Protocol ( Half-Life 2, etc. )</td>
            </tr>
        </tbody>
    </table>
</div>

<legend><?=$this->getTrans('queryports') ?></legend>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <colgroup>
            <col class="col-lg-2">
            <col>
        </colgroup>
        <thead>
            <tr>
                <th>Gametype</th>
                <th>Query Port</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>DayZ SA</th>
                <td>27016, 27116, 27216, etc.</td>
            </tr>
            <tr>
                <th>Battlefield 2</th>
                <td>29900</td>
            </tr>
            <tr>
                <th>Insurgency: Sandstorm</th>
                <td>27015</td>
            </tr>
            <tr>
                <th>Mordhau</th>
                <td>27015</td>
            </tr>
            <tr>
                <th>Killing Floor</th>
                <td>7708</td>
            </tr>
            <tr>
                <th>Killing Floor 2</th>
                <td>27015</td>
            </tr>
            <tr>
                <th>Unturned</th>
                <td>27016</td>
            </tr>
            <tr>
                <th>Minecraft</th>
                <td>25565</td>
            </tr>
            <tr>
                <th>Rust</th>
                <td>28025</td>
            </tr>
            <tr>
                <th>SAMP</th>
                <td>7777</td>
            </tr>
            <tr>
                <th>Quake 3</th>
                <td>27960</td>
            </tr>
            <tr>
                <th>Chivalry: Medieval Warfare</th>
                <td>7778</td>
            </tr>
            <tr>
                <th>ARK: Survival Evolved</th>
                <td>27016</td>
            </tr>
            <tr>
                <th>Teamspeak 3</th>
                <td>10011</td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="col-lg-6 alert alert-warning">
                        <?=$this->getTrans('infoqueryports') ?>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
