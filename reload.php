<?php
$message = shell_exec("bash /var/www/html/refresh.sh");
print_r($message);
?>