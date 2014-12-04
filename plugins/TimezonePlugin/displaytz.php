<?php

$phpTz = date_default_timezone_get();
$phpTime = date('H:i:s');

$result = Sql_Fetch_Row_Query('select @@session.time_zone, time(now())');
$mysqlTz = $result[0];
$mysqlTime = $result[1];

echo <<<END
<p>The php timezone is "$phpTz".<br>The php time is $phpTime.</p>
<p>The mysql timezone is "$mysqlTz".<br>The mysql time is $mysqlTime.</p>
END;
