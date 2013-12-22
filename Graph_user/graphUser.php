<?php

class graphUser
{
	var $tabReference;

	function extractData($tabObject)
	{
        $tabReference=  array();

        foreach ($tabObject as $key => $value) {
            if(count($tabObject[$key]->entities->user_mentions)!=0) {
                foreach ($tabObject[$key]->entities->user_mentions as $key => $value) {
                    if(array_key_exists($value->name,$tabReference)) {
                        $tabReference[$value->name]++;
                    } else {
                        $tabReference[$value->name]=1;
                    }
                }
            }
        }

        /*
        Ajouter des éléments dans néo4J pour obtenir le diagramme.
        */
        $this->insertNeo4J($tabReference,"Jeremy");
        //var_dump($tabReference);
        return $tabReference;
	}

	/*
	format du tableau
	["Nompersonne"]=NombredeTweet
	*/
	function insertNeo4J($dataTrait,$name_of_center)
	{
		require("phar://neo4jphp.phar");

	    $client = new Everyman\Neo4j\Client();

	    $Relation = array();

	    //creation des nodes des personnes
	    foreach ($dataTrait as $key => $value)
	    {
            $Relation[$key]["Node"] = new Everyman\Neo4j\Node($client);
            $Relation[$key]["Nb tweet"]=$value;
            $Relation[$key]["Node"]->setProperty('name_of_relation',$key)->save();
	    }

	    $matrix = new Everyman\Neo4j\Node($client);
	    $matrix->setProperty('Nom personne', $name_of_center)->save();

	    //Affiliation entre les personnes

	    foreach ($Relation as $key => $value)
	    {
	    $matrix->relateTo($Relation[$key]["Node"], 'Be associate 2')
	    ->setProperty('Nb-tweet',   $Relation[$key]["Nb tweet"])
	    ->save();
	    }

	}

}

?>