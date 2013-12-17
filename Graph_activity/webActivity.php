<?php

class webActivity
{



	var $extractData;




	function extractData($tabOject)
	{
		//var_dump($tabOject);
		//$extractData = new array();


		for($a=count($tabOject)-1 ; $a!=0 ;$a--) 
		{
			$date = $tabOject[$a]->created_at;
			
			$explo=explode(" ",$date);
			
			$extractData[$explo[0].' '.$explo[1].' '.$explo[2]]=0;

			for($b=$a;$b!=0;$b--)
			{
				$analyse=explode(" ",$date);

				if($analyse[1]!=$explo[1] || $analyse[0]!=$explo[1])// 1 = mois , 0 == jour
				{
					//alors nouvelle elements dans le tableau
					$extractData[$analyse[0].' '.$analyse[1].' '.$analyse[2]]=0;

				}

			}
			//for()

		}
		foreach ($extractData as $key => $value) 
		{
			for($b=0;$b<count($tabOject);$b++)
			{
				$date = $tabOject[$b]->created_at;
				$analyse=explode(" ",$date);
				

				if($key==$analyse[0].' '.$analyse[1].' '.$analyse[2])// 1 = mois , 0 == jour
				{
					$extractData[$key]++;
				}

			}

		}

		//var_dump($extractData);
		return $extractData;

	}

	


}


?> 