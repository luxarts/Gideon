<?php
$list=scandir(".");
for ($i=0; $i<10; $i++){
echo ("<a href=\"".$list[$i]."\">".$list[$i]."</a><br>");
}
?>
