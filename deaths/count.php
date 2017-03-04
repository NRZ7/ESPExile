<BR><BR><BR><BR><CENTER><B>	
<?php
$line = date('Y-m-d H:i:s') . " - $_SERVER[REMOTE_ADDR]";
file_put_contents('visitors.log', $line . PHP_EOL, FILE_APPEND);
$fp=fopen("views.txt","r");
$count=fgets($fp,1024);
fclose($fp);
$fw=fopen("views.txt","w");
$cnew=$count+1;
$countnew=fputs($fw,$count+1);
fclose($fw); 
?> </B>