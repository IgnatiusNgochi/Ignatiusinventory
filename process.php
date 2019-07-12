<?php

require_once('funcs.php');

//error_log(print_r($_SERVER,true));
if(isset($_GET['sid']))
{
	echo sale($_GET['sid']);
}
if(isset($_GET['rid']))
{
	echo reorder($_GET['rid']);
}





?>