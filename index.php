<?php

	//1 - Settings (please update to math your own)
	$consumer_key='GWsrOc634Km76SVoTKDQ'; //Provide your application consumer key
	$consumer_secret='PiQMNeYsvAe4L25eNoDy2DQKTBmWrx5IMqNojOMStxI'; //Provide your application consumer secret
	$oauth_token = '1920550170-jnntnZ0Oq0Egj3rU5JZcAjge8zcurUHZo6WIZsT'; //Provide your oAuth Token
	$oauth_token_secret = 'VLFHiyTWWSm7XTOsfYfQRiZjpRiIUR0IVMh99WHrE9SZ9'; //Provide your oAuth Token Secret

	//2 - Include @abraham's PHP twitteroauth Library
	include ('twitteroauth.php');

	require("phar://neo4jphp.phar");
    use Everyman\Neo4j\Client,
        Everyman\Neo4j\Transport,
        Everyman\Neo4j\Node,
        Everyman\Neo4j\Relationship;

    $client = new Everyman\Neo4j\Client();

    //print_r($client->getServerInfo());

	//3 - Authentication
	/* Create a TwitterOauth object with consumer/user tokens. */
	$connection = new TwitterOAuth($consumer_key, $consumer_secret, $oauth_token, $oauth_token_secret);

	//4 - Start Querying
    if ($_POST!=NULL) {
        $query = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$_POST['saisie'].'&count=10'; //Your Twitter API query
    }else {
        $query = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=jeremyquindos&count=10'; //Your Twitter API query        
    }
    $content = $connection->get($query);
    

	//$requete = "https://api.twitter.com/1.1/search/tweets.json?q=%23poissy&result_type=recent";
	//echo '<a href="'.$requete.'">clic</a>';

    $keanu = new Node($client);
    $keanu->setProperty('name', 'Keanu Reeves')->save();
    $laurence = new Node($client);
    $laurence->setProperty('name', 'Laurence Fishburne')->save();
    $jennifer = new Node($client);
    $jennifer->setProperty('name', 'Jennifer Connelly')->save();
    $kevin = new Node($client);
    $kevin->setProperty('name', 'Kevin Bacon')->save();

    $matrix = new Node($client);
    $matrix->setProperty('title', 'The Matrix')->save();
    $higherLearning = new Node($client);
    $higherLearning->setProperty('title', 'Higher Learning')->save();
    $mysticRiver = new Node($client);
    $mysticRiver->setProperty('title', 'Mystic River')->save();

    $matrix->relateTo($higherLearning, 'LIVES_ON')
    ->setProperty('duration', 'all his life')
    ->save();
    $matrix->relateTo($mysticRiver, 'LIVES_ON')
    ->setProperty('duration', 'all his life')
    ->save();
    $matrix->relateTo($kevin, 'LIVES_ON')
    ->setProperty('duration', 'all his life')
    ->save();
    $matrix->relateTo($laurence, 'LIVES_ON')
    ->setProperty('duration', 'all his life')
    ->save();
    $matrix->relateTo($jennifer, 'LIVES_ON')
    ->setProperty('duration', 'all his life')
    ->save();

	//var_dump($content);
    require_once('head.php');
?>

<body>
    <?php require_once('header.php'); ?>

    <style>

    svg {
      font: 10px sans-serif;
    }

    .bar rect {
      fill: steelblue;
      shape-rendering: crispEdges;
    }

    .bar text {
      fill: #fff;
    }

    .axis path, .axis line {
      fill: none;
      stroke: #000;
      shape-rendering: crispEdges;
    }

    </style>
    
    <div id="body">
        <div class="col-md-3 no-marge ">
            <aside>
                <ul class="tabs">
                    <li>
                        <input type="radio"  name="tabs" id="tab2">
                        <label for="tab2"><h2>Profil</h2></label>
                        <ul id="tab-content2" class="tab-content animated fadeIn">
                             <img style="float:left; margin-right:10px; padding-top:5px;" src="<?php echo $content[0]->user->profile_image_url;?>"/>
                            <p>  <?php echo $content[0]->user->name;?></br>
                                 <?php echo $content[0]->user->location; ?>  </br>
                                 <a href="<?php echo $content[0]->user->url; ?>" target="_blank"> Link to website</a>  </br>
                                 Description : <?php echo $content[0]->user->description; ?>  </br>
                                 Language : <?php echo $content[0]->user->lang; ?>  </br>
                            </p>                        
                        </ul>
                    </li>
                    <li>
                        <input type="radio" checked name="tabs" id="tab1">
                        <label for="tab1"><h2>Visualization</h2></label>
                        <ul id="tab-content1" class="tab-content animated fadeIn">
                            <li><a href="">Localisation</a></li>
                            <li><a href="">% Retweet</a></li>
                            <li><a href="">Size Usage</a></li>
                            <li><a href="">Technology</a></li>
                         </ul>
                    </li>
                </ul>
            </aside>
        </div>
        <div id="content" class="col-md-9">
            <div class="row">
                <div role="main" class="col-md-offset-1 col-md-9">
                    <article >
                        <h1>BI Dashboard</h1>
                        <button id="butPlay" class="btn btn-primary pull-right" type="button">Play</button>
                        </br>
                        <?php 
                        foreach ($content as $tweet) {
                        
                            $date = new DateTime($tweet->created_at);
                            echo $date->format("l jS \of F Y \a \t h:i:s A").'</br>'.$tweet->text.'</br></br>';
                        }
                        ?>
					</article>  
                </div>

               
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="script/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>