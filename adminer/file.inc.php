<?php
if ($_SERVER["HTTP_IF_MODIFIED_SINCE"]) {
	header("HTTP/1.1 304 Not Modified");
	exit;
}

header("Expires: " . gmdate("D, d M Y H:i:s", time() + 365*24*60*60) . " GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: immutable");

if ($_GET["file"] == "default.css") {
	header("Content-Type: text/css; charset=utf-8");
	echo file_get_contents(__DIR__ . '/static/default.css');
} elseif ($_GET["file"] == "functions.js") {
	header("Content-Type: text/javascript; charset=utf-8");
	echo file_get_contents(__DIR__ . '/static/functions.js');
} elseif ($_GET["file"] == "jush.js") {
	header("Content-Type: text/javascript; charset=utf-8");
	echo file_get_contents(__DIR__ . '/static/jush.js');
} else {
	header("Content-Type: image/gif");
	switch ($_GET["file"]) {
		case "plus.gif": echo file_get_contents(__DIR__ . '/static/plus.gif'); break;
		case "cross.gif": echo file_get_contents(__DIR__ . '/static/cross.gif'); break;
		case "up.gif": echo file_get_contents(__DIR__ . '/static/up.gif'); break;
		case "down.gif": echo file_get_contents(__DIR__ . '/static/down.gif'); break;
		case "arrow.gif": echo file_get_contents(__DIR__ . '/static/arrow.gif'); break;
	}
}
exit;
