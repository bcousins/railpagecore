<?php
	/**
	 * Module detail object
	 * @since Version 3.8.7
	 * @package Railpage
	 * @author Michael Greenhill
	 */
	 
	namespace Railpage;
	
	use Exception;
	use stdClass;
	use Railpage\AppCore;
	use Railpage\Url;
	
	if (!defined("RP_SITE_ROOT")) {
		define("RP_SITE_ROOT", "");
	}
	
	/**
	 * Railpage module information
	 * @since Version 3.8.7
	 */
	 
	class Module extends AppCore {
		
		/**
		 * Name
		 * @since Version 3.8.7
		 * @var string $name
		 */
		
		public $name;
		
		/**
		 * URL of this module
		 * @since Version 3.8.7
		 * @var string $url
		 */
		
		public $url;
		
		/**
		 * Module namespace
		 * @since Version 3.8.7
		 * @var string $namespace;
		 */
		 
		public $namespace;
		
		/**
		 * Module file paths
		 * @since Version 3.8.7
		 * @var string $Paths
		 */
		
		public $Paths;
		
		/**
		 * Colour palette
		 * @since Version 3.8.7
		 * @var \stdClass $Colours
		 */
		
		public $Colours;
		
		/**
		 * Constructor
		 * @since Version 3.8.7
		 * @param string $module
		 */
		
		public function __construct($module) {
			if (is_string($module)) {
				$this->Colours = new stdClass;
				$this->Colours->primary = "#666";
				$this->Colours->accent = "#ddd";
				$this->Colours->inverse = "#333";
				
				switch (strtolower($module)) {
					
					case "assets" : 
						$this->id = 110;
						$this->name = "Assets";
						$this->url = "/assets";
						break;
					
					case "chronicle" : 
						$this->id = 118;
						$this->name = "Chronicle";
						$this->url = "/chronicle";
						break;
					
					case "diagnostics" :
						$this->name = "Diagnostics";
						$this->url = "/diagnostics";
						break;
					
					case "donations" : 
						$this->id = 108;
						$this->name = "Donations";
						$this->url = "/donations";
						break;
					
					case "downloads" : 
						$this->id = 12;
						$this->name = "Downloads";
						$this->url = "/downloads";
						break;
					
					case "events" : 
						$this->id = 119;
						$this->name = "Events";
						$this->url = "/events";
						break;
					
					case "feedback" : 
						$this->id = 3;
						$this->name = "Feedback";
						$this->url = "/feedback";
						break;
					
					case "flickr" :
						$this->id = 72;
						$this->name = "Flickr";
						$this->url = "/flickr";
						break;
					
					case "forums" : 
						$this->id = 22;
						$this->name = "Forums";
						$this->url = "/f.htm";
						break;
					
					case "gallery" : 
						$this->id = 66;
						$this->name = "Gallery";
						$this->url = "/gallery";
						break;
					
					case "glossary" : 
						$this->id = 112;
						$this->name = "Glossary";
						$this->url = "/glossary";
						break;
					
					case "help" : 
						$this->id = 101;
						$this->name = "Help";
						$this->url = "/help";
						break;
					
					case "home" : 
						$this->id = 98;
						$this->name = "Home";
						$this->url = "/home";
						break;
					
					case "ideas" : 
						$this->id = 113;
						$this->name = "Ideas";
						$this->url = "/ideas";
						break;
					
					case "images" : 
						$this->id = 120;
						$this->name = "Images";
						$this->url = "/Images";
						break;
					
					case "image" : 
						$this->id = 120;
						$this->name = "Images";
						$this->url = "/Images";
						break;
					
					case "jobs" : 
						$this->id = 107;
						$this->name = "Jobs";
						$this->url = "/jobs";
						break;
					
					case "links" : 
						$this->id = 76;
						$this->name = "Links";
						$this->url = "/links";
						break;
					
					case "locations" : 
						$this->id = 68;
						$this->name = "Locations";
						$this->url = "/locations";
						$this->Colours->primary = "#116416";
						$this->Colours->accent = "#54A759";
						$this->Colours->inverse = "#004304";
						break;
					
					case "locos" :
						$this->id = 86; 
						$this->name = "Locos";
						$this->url = "/locos";
						$this->Colours->primary = "#3D0CE8";
						$this->Colours->accent = "#576BFF";
						$this->Colours->inverse = "#1B054E";
						break;
					
					case "news" : 
						$this->id = 5;
						$this->name = "News";
						$this->url = "/news";
						$this->Colours->primary = "#8A2E60";
						$this->Colours->accent = "#CE8AAF";
						$this->Colours->inverse = "#450026";
						break;
					
					case "organisations" : 
						$this->id = 121;
						$this->name = "Organisations";
						$this->url = "/orgs";
						break;
					
					case "orgs" : 
						$this->id = 121;
						$this->name = "Organisations";
						$this->url = "/orgs";
						break;
					
					case "place" : 
						$this->id = 122;
						$this->name = "Place";
						$this->url = "/place";
						break;
					
					case "privatemessages" : 
						$this->id = 6;
						$this->name = "Private Messages";
						$this->url = "/messages";
						break;
					
					case "messages" : 
						$this->id = 6;
						$this->name = "Private Messages";
						$this->url = "/messages";
						break;
					
					case "pm" : 
						$this->id = 6;
						$this->name = "Private Messages";
						$this->url = "/messages";
						break;
					
					case "profiles" : 
						$this->id = 87;
						$this->name = "Users";
						$this->url = "/user";
						break;
						
					case "railcams" :
						$this->id = 97;
						$this->name = "Railcams";
						$this->url = "/railcams";
						break;
					
					case "search" : 
						$this->id = 8;
						$this->name = "Search";
						$this->url = "/search";
						break;
					
					case "users" : 
						$this->id = 87;
						$this->name = "Users";
						$this->url = "/user";
						break;
					
					case "reminders" : 
						$this->id = 112;
						$this->name = "Reminders";
						$this->url = "/reminders";
						break;
					
					case "timetables" : 
						$this->id = 102;
						$this->name = "Timetables";
						$this->url = "/timetables";
						break;
						
				}
				
				/**
				 * Lazy populate the namespace
				 */
				 
				if (empty($this->namespace) && !empty($this->name)) {
					$this->namespace = sprintf("railpage.%s", strtolower($this->name));
				}
				
				/**
				 * Lazy populate the URL
				 */
				 
				if (empty($this->url) && !empty($this->name)) {
					$this->url = sprintf("modules.php?name=%s", $this->name);
				}
				
				/**
				 * Create and populate the filesystem paths
				 */
				
				$this->Paths = new stdClass;
				$this->Paths->module = sprintf("%s/modules/%s", RP_SITE_ROOT, $this->name);
				$this->Paths->html = sprintf("%s/modules/%s/html", RP_SITE_ROOT, $this->name);
			}
		}
	}
?>