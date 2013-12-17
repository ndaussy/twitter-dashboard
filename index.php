<?php

	include ('./model/twitteroauth.php');

	require("phar://neo4jphp.phar");
    use Everyman\Neo4j\Client,
        Everyman\Neo4j\Transport,
        Everyman\Neo4j\Node,
        Everyman\Neo4j\Relationship;

    $client = new Everyman\Neo4j\Client();

   	include('./model/DataManager.php');

    $manager = new DataManager();

    $manager->Connection();

    session_start();

    $content = $manager->getTweets();

    $_SESSION['content'] = $content;
	//var_dump($content);
    require_once('head.php');
?>

<body>
    <?php require_once('header.php'); ?>

    <div id="body">
        <div class="col-md-3 no-marge ">
            <aside>
                <ul class="tabs">
                    <li>
                        <input type="radio"  name="tabs" checked id="tab2">
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
                        <input type="radio"  name="tabs" id="tab1">
                        <label for="tab1"><h2>Visualization</h2></label>
                        <ul id="tab-content1" class="tab-content animated fadeIn">
                            <li><a class="active" id="view-techno" href="#">Technology</a></li>
                            <li><a id="view-activity" href="#">Activity</a></li>
                            <li><a id="view-user" href="#">User</a></li>
                            <li><a href="#">Size Usage</a></li>
                         </ul>
                    </li>
                </ul>
            </aside>
        </div>
        <div id="content" class="col-md-9">
            <div class="row">
                <div role="main" class="col-md-offset-1 col-md-9">
                    <article >
                        <h1 style="text-align:center;">BI Dashboard</h1>
                        </br>
                        <iframe id="frame-techno" width="100%" height="500" src="http://localhost/ece_data_mining/Graph_techno/viewTechnoUse.php" allowfullscreen="allowfullscreen" frameborder="0"></iframe>
					    <iframe id="frame-activity" style="display:none;" width="100%" height="500" src="http://localhost/ece_data_mining/Graph_activity/viewActivity.php" allowfullscreen="allowfullscreen" frameborder="0"></iframe>
					    <iframe id="frame-user" style="display:none;" width="100%" height="800" src="http://localhost/ece_data_mining/Graph_user/viewgraphUser.php" allowfullscreen="allowfullscreen" frameborder="0"></iframe>
					</article>
                </div>
                <script>
                    window.onload = function()
                    {
                        (function (){
                            if(!!window.HTMLVideoElement){
                                var viewTechno= document.getElementById('view-techno');
                                var viewActivity = document.getElementById('view-activity');
                                var viewUser = document.getElementById('view-user');
                                var progressbar= document.getElementById('progressbar');

                                viewTechno.addEventListener('click',function(){
                                    viewActivity.className = "";
                                    viewUser.className = "";
                                    $('#frame-techno').css({'display':'block'});
                                    $('#frame-activity').css({'display':'none'});
                                    $('#frame-user').css({'display':'none'});
                                    viewTechno.className = "active";
                                });

                                viewActivity.addEventListener('click',function(){
                                    viewUser.className = "";
                                    viewTechno.className = "";
                                    $('#frame-techno').css({'display':'none'});
                                    $('#frame-activity').css({'display':'block'});
                                    $('#frame-user').css({'display':'none'});
                                    viewActivity.className = "active";
                                });

                                viewUser.addEventListener('click',function(){
                                    viewActivity.className = "";
                                    viewTechno.className = "";
                                    $('#frame-techno').css({'display':'none'});
                                    $('#frame-activity').css({'display':'none'});
                                    $('#frame-user').css({'display':'block'});
                                    viewUser.className = "active";
                                });
                            }
                        })();
                    }
                </script>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="script/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>