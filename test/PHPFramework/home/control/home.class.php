<?php

class	home	extends	control

{
//1111
function	index()
{
    $mysqli = new mysqli('localhost:3306','admin','123456','test');
    $mysqli ->set_charset("utf8");
    $sql = "SELECT cid,cname FROM selling";
    $navigation_bar='<li><a class="color" href="shop/test/PHPFramework/index.php?a=home&c=home&m=index"';
    if ($result= $mysqli->query($sql)) {
        while ($row = $result ->fetch_assoc()){
            $navigation_bar  .='<li><a class="color" href="shop/test/PHPFramework/index.php?a=home&c=home&m=index">'. $row['cname']
        }

        )
    }
$this->display();
}
}
?>