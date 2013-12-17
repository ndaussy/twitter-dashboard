<?php


class technoUse
{
	var $tabReference;

	function extractData($tabObject)
	{

		$tabReference = array();

		foreach ($tabObject as $key => $value) 
		{	
			if(array_key_exists($tabObject[$key]->source,$tabReference))
			{
				$tabReference[$tabObject[$key]->source]++;
			}
			else
			{

				$tabReference[$tabObject[$key]->source]=1;
			}
		}		

		


		return $tabReference;
		


	}


}