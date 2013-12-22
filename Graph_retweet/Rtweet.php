<?php

class Rtweet
{
	var $extractData;
	function extractData($tabOject)
	{
		//var_dump($tabOject);
		//$extractData = new array();
		$extractData=array();

		for($a=0;$a<count($tabOject);$a++)
		{
			$extractData["retweet"][$a]=$tabOject[$a]->retweet_count;
			$extractData["favorite"][$a]=$tabOject[$a]->favorite_count;
			$extractData["data"][$a]=$tabOject[$a]->text;
		}
		return $extractData;
	}
}


?> 