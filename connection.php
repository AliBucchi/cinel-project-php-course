<?php
# http://localhost/aula3/connection.php

require_once("defines.php");

define("CONNECT", mysqli_connect(HOST,USER,PASS,DB));

?>