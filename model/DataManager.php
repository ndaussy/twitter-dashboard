<?php
require_once ('People.php');

/**
 * @author Rémi
 * @version 1.0
 * @created 17-déc.-2013 17:28:35
 */
class DataManager
{

	public $m_People;
	private $consumer_key='GWsrOc634Km76SVoTKDQ'; //Provide your application consumer key
	private $consumer_secret='PiQMNeYsvAe4L25eNoDy2DQKTBmWrx5IMqNojOMStxI'; //Provide your application consumer secret
	private $oauth_token = '1920550170-jnntnZ0Oq0Egj3rU5JZcAjge8zcurUHZo6WIZsT'; //Provide your oAuth Token
	private $oauth_token_secret = 'VLFHiyTWWSm7XTOsfYfQRiZjpRiIUR0IVMh99WHrE9SZ9'; //Provide your oAuth Token Secret
    
    private $connection; 
    private $content; 

	function __construct()
	{
        
	}

	public function Connection()
	{
        //3 - Authentication
        /* Create a TwitterOauth object with consumer/user tokens. */
        $this->connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret, $this->oauth_token, $this->oauth_token_secret);

        //4 - Start Querying
        if ($_POST!=NULL) {
            $query = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$_POST['saisie'].'&count=200'; //Your Twitter API query
        }else {
            $query = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=jeremyquindos&count=200'; //Your Twitter API query
        }
        $this->content = $this->connection->get($query);
	}

	public function Deconnection()
	{
	}

	/**
	 *
	 * @param user
	 */
	public function getTweets()
	{
        return $this->content;
	}

	/**
	 *
	 * @param name
	 */
	public function GetUser(String $name)
	{
    
	}

}
?>