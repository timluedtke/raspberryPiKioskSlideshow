<?php
$message = shell_exec("/home/pi/refresh.sh 2>&1");
print_r($message);
?>  