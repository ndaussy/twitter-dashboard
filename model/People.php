<?php
require_once ('Tweet.php');


/**
 * @author Rémi
 * @version 1.0
 * @created 17-déc.-2013 17:28:36
 */
class People
{
	private $description;
	private $location;
	private $langage;
	private $nom;
	private $image;
	private $url;
	private $tweets;
	public $m_Tweet;

	public function __construct($content)
	{       
        $this->image = $content[0]->user->profile_image_url;
        $this->nom = $content[0]->user->name;
        $this->location = $content[0]->user->location;
        $this->url = $content[0]->user->url;
        $this->description = $content[0]->user->description;
        $this->langage = $content[0]->user->lang;        
	}

	public function __destruct()
	{
	}
    
    /**
     * Set description
     *
     * @param string $description
     *
     * @return People
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
    
    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Set location
     *
     * @param string $location
     *
     * @return People
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }
    
    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }
    
    /**
     * Set langage
     *
     * @param string $langage
     *
     * @return People
     */
    public function setLangage($langage)
    {
        $this->langage = $langage;

        return $this;
    }
    
    /**
     * Get langage
     *
     * @return string
     */
    public function getLangage()
    {
        return $this->langage;
    }
    
    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return People
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
    
    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }
    
    /**
     * Set image
     *
     * @param string $image
     *
     * @return People
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
    
    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * Set url
     *
     * @param string $url
     *
     * @return People
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }
    
    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
    
   
}
?>