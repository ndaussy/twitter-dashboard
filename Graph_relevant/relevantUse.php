<?php


class relevantUse
{
	var $tabReference;

	function extractData($tabObject)
	{
		$tabReference = array();
        $counter=0;
        $tabReference['Relevant'] = 0;

		foreach ($tabObject as $key => $value)
		{
            $counter++;
			if( $tabObject[$key]->favorite_count != 0 || $tabObject[$key]->retweet_count != 0 )
			{
				$tabReference['Relevant']++;
			}
            $tabReference['Irrelevant']=$counter-$tabReference['Relevant'];
		}
		return $tabReference;
	}


}