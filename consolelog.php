<?php
function console_log($data, $add_script_tags = false)
{
	$command = 'console.log(' . json_encode($data, JSON_HEX_TAG) . ');';
	$command = '<script>' . $command . '</script>';
	echo $command;
}
echo "banzaiiiiiiiiiiiiiii !!!"