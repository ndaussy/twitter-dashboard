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
	private $consumer_key;
	private $consumer_secret;
	private $oauth_token_secret;
	private $oauth_token;
    
    private $connection; 
    private $content; 
    
    /**
    * Contructor
    */
	function __construct()
	{        
        $this->consumer_key='GWsrOc634Km76SVoTKDQ'; //Provide your application consumer key
        $this->consumer_secret='PiQMNeYsvAe4L25eNoDy2DQKTBmWrx5IMqNojOMStxI'; //Provide your application consumer secret
        $this->oauth_token = '1920550170-jnntnZ0Oq0Egj3rU5JZcAjge8zcurUHZo6WIZsT'; //Provide your oAuth Token
        $this->oauth_token_secret = 'VLFHiyTWWSm7XTOsfYfQRiZjpRiIUR0IVMh99WHrE9SZ9'; //Provide your oAuth Token Secret 
        
	}

	public function Connection()
	{
        //3 - Authentication
        /* Create a TwitterOauth object with consumer/user tokens. */
        $this->connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret, $this->oauth_token, $this->oauth_token_secret);

        //4 - Start Querying
        if ($_POST!=NULL) {
            if( isset($_POST['counter'])) {
                $query = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$_POST['saisie'].'&count='.$_POST['counter']; //Your Twitter API query
            } else {
                $query = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$_POST['saisie'].'&count=20'; //Your Twitter API query
            }
        }else {
            $query = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=jeremyquindos&count=50'; //Your Twitter API query
        }
        $content = $this->connection->get($query);
        $this->content = $content;
        
        $this->m_People = new People($content);
	}

	public function Deconnection()
	{
	}

	/**
	 * getTweets
     *
     * @return array
	 */
	public function getTweets()
	{
        return $this->content;
	}

	/**
	 * GetUser
     *
	 * @param name
	 */
	public function getUser()
	{
        return $this->m_People;
	}
    
     /**
     * Set consumer_key
     *
     * @param float $consumer_key
     *
     * @return DataManager
     */
    public function setConsumer_key($consumer_key)
    {
        $this->consumer_key = $consumer_key;

        return $this;
    }
    
    /**
     * Set oauth_token_secret
     *
     * @param float $oauth_token_secret
     *
     * @return DataManager
     */
    public function setOauth_token_secret($oauth_token_secret)
    {
        $this->oauth_token_secret = $oauth_token_secret;

        return $this;
    }
    
    /**
     * Set consumer_secret
     *
     * @param float $consumer_secret
     *
     * @return DataManager
     */
    public function setConsumer_secret($consumer_secret)
    {
        $this->consumer_secret = $consumer_secret;

        return $this;
    }
    
    /**
     * Set oauth_token
     *
     * @param float $oauth_token
     *
     * @return DataManager
     */
    public function setOauth_token($oauth_token)
    {
        $this->oauth_token = $oauth_token;

        return $this;
    }
    
    /**
     * Get consumer_secret
     *
     * @return string
     */
    public function getConsumer_secret()
    {
        return $this->consumer_secret;
    }
    
    /**
     * Get consumer_key
     *
     * @return string
     */
    public function getConsumer_key()
    {
        return $this->consumer_key;
    }
    
    /**
     * Get oauth_token
     *
     * @return string
     */
    public function getOauth_token()
    {
        return $this->oauth_token;
    }
    
    /**
     * Get oauth_token_secret
     *
     * @return string
     */
    public function getOauth_token_secret()
    {
        return $this->oauth_token_secret;
    }

}
?>