<?php
//$result = ihttp_request("http://mp.angelbeautyinc.com/attachment/images/8/2016/07/D177uD1z7F072wgHZ97hx7xs19eD0A.jpg");
//var_dump($result);
/*$_h = curl_init();
curl_setopt($_h, CURLOPT_HEADER, 1);
curl_setopt($_h, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($_h, CURLOPT_HTTPGET, 1);
curl_setopt($_h, CURLOPT_URL, 'http://mp.angelbeautyinc.com/app/themes/default/images/bg_index.jpg' );
curl_setopt($_h, CURLOPT_DNS_USE_GLOBAL_CACHE, false );
curl_setopt($_h, CURLOPT_DNS_CACHE_TIMEOUT, 2 );

var_dump(curl_exec($_h));
var_dump(curl_getinfo($_h));
var_dump(curl_error($_h)); 
*/
phpinfo();
exit ;
function ihttp_request($url, $post = '', $extra = array(), $timeout = 60) {
	$urlset = parse_url($url);
	if (empty($urlset['path'])) {
		$urlset['path'] = '/';
	}
	if (!empty($urlset['query'])) {
		$urlset['query'] = "?{$urlset['query']}";
	}

	if (empty($urlset['port'])) {
		$urlset['port'] = $urlset['scheme'] == 'https' ? '443' : '80';
	}
	if (strexists($url, 'https://') && !extension_loaded('openssl')) {
		if (!extension_loaded("openssl")) {
			message('请开启您PHP环境的openssl');
		}
	}

	if (function_exists('curl_init') && function_exists('curl_exec')) {
		$ch = curl_init();
		if (ver_compare(phpversion(), '5.6') >= 0) {
			curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
		}

		if (!empty($extra['ip'])) {
			$extra['Host'] = $urlset['host'];
			$urlset['host'] = $extra['ip'];
			unset($extra['ip']);
		}

		curl_setopt($ch, CURLOPT_URL, $urlset['scheme'] . '://' . $urlset['host'] . ($urlset['port'] == '80' ? '' : ':' . $urlset['port']) . $urlset['path'] . $urlset['query']);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		@curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		@curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
		if ($post) {
			if (is_array($post)) {
				$filepost = false;
				foreach ($post as $name => $value) {
					if ((is_string($value) && substr($value, 0, 1) == '@') || (class_exists('CURLFile') && $value instanceof CURLFile)) {
						$filepost = true;
						break;
					}
				}
				if (!$filepost) {
					$post = http_build_query($post);
				}
			}
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		}
		if (!empty($GLOBALS['_W']['config']['setting']['proxy'])) {
			$urls = parse_url($GLOBALS['_W']['config']['setting']['proxy']['host']);
			if (!empty($urls['host'])) {
				curl_setopt($ch, CURLOPT_PROXY, "{$urls['host']}:{$urls['port']}");
				$proxytype = 'CURLPROXY_' . strtoupper($urls['scheme']);
				if (!empty($urls['scheme']) && defined($proxytype)) {
					curl_setopt($ch, CURLOPT_PROXYTYPE, constant($proxytype));
				} else {
					curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
					curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
				}
				if (!empty($GLOBALS['_W']['config']['setting']['proxy']['auth'])) {
					curl_setopt($ch, CURLOPT_PROXYUSERPWD, $GLOBALS['_W']['config']['setting']['proxy']['auth']);
				}
			}
		}
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSLVERSION, 1);
		if (defined('CURL_SSLVERSION_TLSv1')) {
			curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
		}
		//curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:9.0.1) Gecko/20100101 Firefox/9.0.1');
		if (!empty($extra) && is_array($extra)) {
			$headers = array();
			foreach ($extra as $opt => $value) {
				if (strexists($opt, 'CURLOPT_')) {
					curl_setopt($ch, constant($opt), $value);
				} elseif (is_numeric($opt)) {
					curl_setopt($ch, $opt, $value);
				} else {
					$headers[] = "{$opt}: {$value}";
				}
			}
			if (!empty($headers)) {
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			}
		}
		$data = curl_exec($ch);
		$status = curl_getinfo($ch);
		$errno = curl_errno($ch);
		$error = curl_error($ch);
		curl_close($ch);
		if ($errno || empty($data)) {
			return error(1, $error);
		} else {
			return ihttp_response_parse($data);
		}
	}
	$method = empty($post) ? 'GET' : 'POST';
	$fdata = "{$method} {$urlset['path']}{$urlset['query']} HTTP/1.1\r\n";
	$fdata .= "Host: {$urlset['host']}\r\n";
	if (function_exists('gzdecode')) {
		$fdata .= "Accept-Encoding: gzip, deflate\r\n";
	}
	$fdata .= "Connection: close\r\n";
	if (!empty($extra) && is_array($extra)) {
		foreach ($extra as $opt => $value) {
			if (!strexists($opt, 'CURLOPT_')) {
				$fdata .= "{$opt}: {$value}\r\n";
			}
		}
	}
	$body = '';
	if ($post) {
		if (is_array($post)) {
			$body = http_build_query($post);
		} else {
			$body = urlencode($post);
		}
		$fdata .= 'Content-Length: ' . strlen($body) . "\r\n\r\n{$body}";
	} else {
		$fdata .= "\r\n";
	}
	if ($urlset['scheme'] == 'https') {
		$fp = fsockopen('ssl://' . $urlset['host'], $urlset['port'], $errno, $error);
	} else {
		$fp = fsockopen($urlset['host'], $urlset['port'], $errno, $error);
	}
	stream_set_blocking($fp, true);
	stream_set_timeout($fp, $timeout);
	if (!$fp) {
		return error(1, $error);
	} else {
		fwrite($fp, $fdata);
		$content = '';
		while (!feof($fp))
			$content .= fgets($fp, 512);
		fclose($fp);
		return ihttp_response_parse($content, true);
	}
}

function strexists($string, $find) {
	return !(strpos($string, $find) === FALSE);
}

function ver_compare($version1, $version2) {
	$version1 = str_replace('.', '', $version1);
	$version2 = str_replace('.', '', $version2);

	$oldLength = istrlen($version1);
	$newLength = istrlen($version2);

	if (is_numeric($version1) && is_numeric($version2)) {
		if ($oldLength > $newLength) {
			$version2 .= str_repeat('0', $oldLength - $newLength);
		}
		if ($newLength > $oldLength) {
			$version1 .= str_repeat('0', $newLength - $oldLength);
		}
		$version1 = intval($version1);
		$version2 = intval($version2);
	}
	return version_compare($version1, $version2);
}

function istrlen($string, $charset = '') {
	global $_W;
	if (empty($charset)) {
		$charset = $_W['charset'];
	}
	if (strtolower($charset) == 'gbk') {
		$charset = 'gbk';
	} else {
		$charset = 'utf8';
	}
	if (function_exists('mb_strlen')) {
		return mb_strlen($string, $charset);
	} else {
		$n = $noc = 0;
		$strlen = strlen($string);

		if ($charset == 'utf8') {

			while ($n < $strlen) {
				$t = ord($string[$n]);
				if ($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
					$n++;
					$noc++;
				} elseif (194 <= $t && $t <= 223) {
					$n += 2;
					$noc++;
				} elseif (224 <= $t && $t <= 239) {
					$n += 3;
					$noc++;
				} elseif (240 <= $t && $t <= 247) {
					$n += 4;
					$noc++;
				} elseif (248 <= $t && $t <= 251) {
					$n += 5;
					$noc++;
				} elseif ($t == 252 || $t == 253) {
					$n += 6;
					$noc++;
				} else {
					$n++;
				}
			}

		} else {

			while ($n < $strlen) {
				$t = ord($string[$n]);
				if ($t > 127) {
					$n += 2;
					$noc++;
				} else {
					$n++;
					$noc++;
				}
			}

		}

		return $noc;
	}
}
