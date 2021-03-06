<?php
/**
 * @copyright Ilch 2
 * @package ilch
 */

return [
    'type' => 'Spiel Typ',
    'ip' => 'Server IP',
    'c_port' => 'Server Port',
    'q_port' => 'Query Port',
    's_port' => 'Software Port',
    'zone' => 'In Box anzeigen',
    'disabled' => 'In Serverliste anzeigen',
    'comment' => 'Kommentar',
    'lgsl' => 'Gamserver',
    'menuGameserver' => 'Gameserver',
    'menuGameserverOverview' => 'Gameserver Übersicht',
    'menuServers' => 'Verwalten',
    'addServers' => 'Erstellen',
    'settingServers' => 'Einstellungen',
    'infoServers' => 'Informationen',
    'phpfunctions' => 'PHP Funktionen',
    'choosinggametype' => 'Auswahl der Spieltypen',
    'queryports' => 'Auswahl der Queryports',
    'infofsockopen' => 'Erforderlich für die direkte Abfrage von Servern',
    'infocurl' => 'Wird für den Feed verwendet, wenn fsockopen deaktiviert ist',
    'infomb' => 'Wird verwendet, um UTF-8-Server- und Spielernamen korrekt anzuzeigen',
    'infobz' => 'Wird verwendet, um die Einstellungen des Quellservers über eine bestimmte Größe anzuzeigen',
    'infogz' => 'Erforderlich für Americas Army 3',
    'infosport' => 'Der Software-Port wird nur für einige Spiele benötigt, daher kann diese Feld freigelassen werden.',
    'infoqport' => 'Bei vielen Servern ist der Abfrageport = Verpindungsport, dann kann dieses Feld freigelassen werden. Bei manchen Servern wird jedoch ein anderer Abfrageport als der Verbindungsport verwendet. <a href="info">Siehe auch hier</a>!',
    'infoqueryports' => 'Bei manchen Servern wird ein etwas anderer Abfrageport als der Verbindungsport verwendet. Versuchen Sie, den Abfrageport als "Verbindungsport + 1" einzugeben. Beispiel: Verbindungsport 27015 = Abfrageport 27016. Dies trifft häufig auf Killing Floor, Unturned und einige andere Server zu.',
    'noServers' => 'Keine Server eingetragen',
    'select' => 'Bitte auswählen',
    'position' => 'Pos',
    'saveSort' => 'Sortierung speichern',
    'delCache' => 'Servercache leeren',
    'delcacheSuccess' => 'Die Servercache wurde erfolgreich geleert.',
    'serverInfoText' => 'Die Informationen eines Servers können innerhalb der Serveransicht bearbeitet werden. Die Server können durch ziehen und ablegen sortiert werden.',
    'user' => 'Nutzer',
    'overview' => 'Server Übersicht',
    'userinfo' => 'Nutzer Information',
    'serverinfo' => 'Server Information',
    'serverconfig' => 'Server Einstellungen',
    'locations' => 'Standortanzeige',
    'sortings' => 'Sortierungen',
    'server' => 'Server',
    'boxen' => 'Boxen',
    'info' => 'Info!',
    'showLocation' => 'Standortflagge anzeigen',
    'infoShowLocation' => 'Ermittelt über die IP den Standort und zeigt die Standortflagge an.',
    'fixLocation' => 'Festen Standort angeben',
    'infoFixLocation' => 'Zeigt nur noch den manuell eingestellten Standort (z.B. DE=Deutschland) an und erhöht dadurch die Ladegeschwindigkeit.',
    'sortServers' => 'Serversortierung',
    'sortPlayers' => 'Spielersortierung',
    'cacheTime' => 'Aktualisierungszeit',
    'infoCacheTime' => 'Zeit in Sekunden bevor ein Server wieder aktualisiert wird (Standard: 60).',
    'liveTime' => 'Abrufzeit',
    'infoLiveTime' => 'Zeit in Sekunden die zum Aktualisieren der Server pro Seite zulässig ist (Standard: 3).',
    'timeOut' => 'Erhöhung der Abrufzeit',
    'infoTimeOut' => 'Gibt den Servern mehr Zeit zum Antworten bei Zeitüberschreitungen, erhöht jedoch die Ladeverzögerung.',
    'retryOffline' => 'Abfragewiederholung',
    'infoRetryOffline' => 'Wiederholt die Abfrage, wenn keine Antwort erfolgt. Erhöht jedoch die Ladeverzögerung zusätzlich.',
    'hostToIp' => 'Nur IP Anzeige',
    'infoHostToIp' => 'Zeigt immer nur die IP des Servers, anstelle eines möglichen Hostnamens, an.',
    'zonePlayer' => 'Anzeige Spielerliste',
    'infoZonePlayer' => 'Zeigt die Spielerliste in der Box an.',
    'zoneLineSize' => 'Höhe Spielerliste',
    'infoZoneLineSize' => 'Höhe der Spieler Box multipliziert mit der Anzahl der Spielernamen (Standard: 19).',
    'zoneHeightLimit' => 'Max. Höhe Spielerbox',
    'infoZoneHeightLimit' => 'Höhe der Spielerbox (Standard: 100).',
    'ttl' => 'Live Game Server Liste',
    'vsd' => 'Zur Anzeige der Serverdetails',
    'slk' => 'Softwarelink',
    'lik' => 'Link',
    'sts' => 'Status',
    'adr' => 'Adresse',
    'cpt' => 'Verbindungs Port',
    'qpt' => 'Query Port',
    'typ' => 'Typ',
    'gme' => 'Spiel',
    'map' => 'Map',
    'plr' => 'Spieler',
    'dtl' => 'Details',
    'npi' => 'Keine Spieler Informationen',
    'nei' => 'Keine Server Informationen',
    'ehs' => 'Einstellung',
    'ehv' => 'Wert',
    'onl' => 'Online',
    'onp' => 'Online mit Passwort',
    'nrs' => 'Keine Antwort',
    'pen' => 'Warte auf Abfrage',
    'zpl' => 'Spieler: ',
    'mid' => 'Ungültige Server ID',
    'nnm' => '--',
    'nmp' => '--',
    'tns' => 'Server',
    'tnp' => 'Spieler',
    'tmp' => 'Max Spieler',
    'ats' => 'Test Server',
    'anr' => 'Keine Antwort - Bitte Daten auf Richtigkeit prüfen!',
    'loc' => 'Standort: ',
    'bak' => 'Zurück zur Serverliste',
    'enb' => 'Aktiviert',
    'dsb' => 'Deaktviert',      
];
