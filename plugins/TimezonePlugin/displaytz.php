<?php

if ($_POST) {
    SaveConfig('timezone_php', $_POST['timezone_php']);
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}
/*
 *  Display the php and mysql timezone and time
 */
$phpTz = date_default_timezone_get();
$phpTime = date('H:i:s');
$result = Sql_Fetch_Row_Query('select @@session.time_zone, time(now())');
$mysqlTz = $result[0];
$mysqlTime = $result[1];
echo <<<END
<div class="note">
    <p>The php timezone is "$phpTz".<br>The php time is $phpTime.</p>
    <p>The mysql timezone is "$mysqlTz".<br>The mysql time is $mysqlTime.</p>
</div>
END;
/*
 *  Display form to set the php timezone
 */
$zoneContinents = [];

foreach (timezone_identifiers_list() as $identifier) {
    $parts = explode('/', $identifier);
    $zoneContinents[$parts[0]][$identifier] = $identifier;
}
$dropDown = CHtml::dropDownList(
    'timezone_php',
    getConfig('timezone_php'),
    ['' => 'Use system'] + $zoneContinents
);

echo <<<END
<div class="panel">
    <div class="header"><h2>Set the php timezone</h2></div>
    <div class="content">
        <form method="POST">
            $dropDown
            <input type="submit" value="Submit"/>
        </form>
    </div>
</div>
END;
