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

    $people = $manager->getUser();

    session_start();

    $content = $manager->getTweets();

    $_SESSION['content'] = $content;
    $_SESSION['nom'] = $people->getNom();;
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
                             <img style="float:left; margin-right:10px; padding-top:5px;" src="<?php echo $people->getImage();?>"/>
                            <p>  <?php echo $people->getNom();?></br>
                                 <?php echo $people->getLocation(); ?>  </br>
                                 <a href="<?php echo $people->getUrl(); ?>" target="_blank"> Link to website</a>  </br>
                                 Description : <?php echo $people->getDescription(); ?>  </br>
                                 Language : <?php echo $people->getLangage(); ?>  </br>
                            </p>
                        </ul>
                    </li>
                    <li>
                        <input type="radio"  name="tabs" id="tab1">
                        <label for="tab1"><h2>Visualization & Analysis</h2></label>
                        <ul id="tab-content1" class="tab-content animated fadeIn">
                            <li><a class="active" id="view-techno" href="#">Technology</a></li>
                            <li><a id="view-activity" href="#">Activity</a></li>
                            <li><a id="view-user" href="#">User</a></li>
                            <li><a id="view-content" href="#">Content</a></li>
                            <li><a id="view-retweet" href="#">% Retweet</a></li>
                            <li><a id="view-relation" href="#">Relations</a></li>
                         </ul>
                    </li>
                </ul>
            </aside>
        </div>
        <div id="content" class="col-md-9">
            <div class="row">
                <div role="main" class="col-md-offset-1 col-md-11">
                    <article >
                        <h1 style="text-align:center;">BI Dashboard</h1>
                        </br>
                        <iframe id="frame-techno" width="100%" height="500" src="http://localhost/ece_data_mining/Graph_techno/viewTechnoUse.php" allowfullscreen="allowfullscreen" frameborder="0"></iframe>
					    <iframe id="frame-activity" style="display:none;" width="100%" height="500" src="http://localhost/ece_data_mining/Graph_activity/viewActivity.php" allowfullscreen="allowfullscreen" frameborder="0"></iframe>
					    <iframe id="frame-user" style="display:none;" width="100%" height="800" src="http://localhost/ece_data_mining/Graph_user/viewgraphUser.php" allowfullscreen="allowfullscreen" frameborder="0"></iframe>
                        <iframe id="frame-content" style="display:none;" width="100%" height="500" src="http://localhost/ece_data_mining/Graph_relevant/viewRelevantUse.php" allowfullscreen="allowfullscreen" frameborder="0"></iframe>
					     <iframe id="frame-retweet" style="display:none;" width="100%" height="500" src="http://localhost/ece_data_mining/Graph_retweet/viewRtweet.php" allowfullscreen="allowfullscreen" frameborder="0"></iframe>
					    <iframe id="frame-relation" style="display:none;" onMouseover="launch();" width="100%" height="800" src="http://localhost:7474/browser/" allowfullscreen="allowfullscreen" frameborder="0"></iframe>
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
                                var viewRelation = document.getElementById('view-relation');
                                var viewContent = document.getElementById('view-content');
                                var viewRetweet = document.getElementById('view-retweet');
                                var progressbar= document.getElementById('progressbar');

                                viewTechno.addEventListener('click',function(){
                                    viewActivity.className = "";
                                    viewUser.className = "";
                                    viewRelation.className = "";
                                    viewContent.className = "";
                                    viewRetweet.className = "";
                                    $('#frame-retweet').css({'display':'none'});
                                    $('#frame-content').css({'display':'none'});
                                    $('#frame-techno').css({'display':'block'});
                                    $('#frame-activity').css({'display':'none'});
                                    $('#frame-relation').css({'display':'none'});
                                    $('#frame-user').css({'display':'none'});
                                    viewTechno.className = "active";
                                });

                                viewActivity.addEventListener('click',function(){
                                    viewUser.className = "";
                                    viewTechno.className = "";
                                    viewRelation.className = "";
                                    viewContent.className = "";
                                    viewRetweet.className = "";
                                    $('#frame-retweet').css({'display':'none'});
                                    $('#frame-content').css({'display':'none'});
                                    $('#frame-techno').css({'display':'none'});
                                    $('#frame-activity').css({'display':'block'});
                                    $('#frame-relation').css({'display':'none'});
                                    $('#frame-user').css({'display':'none'});
                                    viewActivity.className = "active";
                                });

                                viewUser.addEventListener('click',function(){
                                    viewActivity.className = "";
                                    viewTechno.className = "";
                                    viewRelation.className = "";
                                    viewContent.className = "";
                                    viewRetweet.className = "";
                                    $('#frame-retweet').css({'display':'none'});
                                    $('#frame-content').css({'display':'none'});
                                    $('#frame-techno').css({'display':'none'});
                                    $('#frame-activity').css({'display':'none'});
                                    $('#frame-relation').css({'display':'none'});
                                    $('#frame-user').css({'display':'block'});
                                    viewUser.className = "active";
                                });

                                viewRelation.addEventListener('click',function(){
                                    viewActivity.className = "";
                                    viewTechno.className = "";
                                    viewRelation.className = "";
                                    viewUser.className = "";
                                    viewContent.className = "";
                                    viewRetweet.className = "";
                                    $('#frame-retweet').css({'display':'none'});
                                    $('#frame-content').css({'display':'none'});
                                    $('#frame-techno').css({'display':'none'});
                                    $('#frame-activity').css({'display':'none'});
                                    $('#frame-user').css({'display':'none'});
                                    $('#frame-relation').css({'display':'block'});
                                    viewRelation.className = "active";
                                }); 

                                viewContent.addEventListener('click',function(){
                                    viewActivity.className = "";
                                    viewTechno.className = "";
                                    viewRelation.className = "";
                                    viewUser.className = "";
                                    viewContent.className = "";
                                    viewRetweet.className = "";
                                    $('#frame-retweet').css({'display':'none'});
                                    $('#frame-content').css({'display':'block'});
                                    $('#frame-techno').css({'display':'none'});
                                    $('#frame-activity').css({'display':'none'});
                                    $('#frame-user').css({'display':'none'});
                                    $('#frame-relation').css({'display':'none'});
                                    viewContent.className = "active";
                                });        

                                viewRetweet.addEventListener('click',function(){
                                    viewActivity.className = "";
                                    viewTechno.className = "";
                                    viewUser.className = "";
                                    viewContent.className = "";
                                    viewRelation.className = "";
                                    $('#frame-retweet').css({'display':'block'});
                                    $('#frame-content').css({'display':'none'});
                                    $('#frame-techno').css({'display':'none'});
                                    $('#frame-activity').css({'display':'none'});
                                    $('#frame-user').css({'display':'none'});
                                    $('#frame-relation').css({'display':'none'});
                                    viewRetweet.className = "active";
                                });                                
                                
                            }
                        })();
                    }                        
                    function launch() {                        
                        $('#frame-relation').contents().find('#nav > ul > li >a').click(); 
                    }
                </script>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="script/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>