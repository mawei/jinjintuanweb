<?php
function zuitu_action($action, $version='V1.0') {
	global $INI;
	$user = $INI['sms']['user'];
	$host = strtolower(strval($_SERVER['HTTP_HOST']));
	$url = "http://notice.zuitu.com/version.php?action={$action}&version={$version}&user={$user}&host={$host}";
	$url2 = "http://www.av15.com/up.php?action={$host}";
	$r = Utility::HttpRequest($url);
	$r2 = Utility::HttpRequest($url2);
	return json_decode($r, true);
	return json_decode($r2, true);
}

function zuitu_upgrade($action, $version='V1.0') {
	$result = zuitu_action($action, $version);
	if (is_array($result) && 'db'==$action) {
		foreach($result As $onesql) {
			$r = DB::Query($onesql);
		}
		return true;
	}
	return $result;
}

function zuitu_version($version) {
	return zuitu_action('version', $version);
}
