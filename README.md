plexWatch/Web - v1.5.4.2 (fork)
========================

A web front-end for plexWatch.

__This fork has been modified to include city and state location data next to all IP addresses, for ease of keeping tabs on who's watching your server.__

__I have also updated the external location links (to Google) to use the latitude and longitude values of the IP address (instead of the city, state pair). Those links also now pass through a dereferer service on their way out, for a dash of privacy.__

* plexWatch/Web: https://github.com/ecleese/plexWatchWeb
* plexWatch: https://github.com/ljunkie/plexWatch
* plexWatch Plex forum thread: http://forums.plexapp.com/index.php/topic/72552-plexwatch-plex-notify-script-send-push-alerts-on-new-sessions-and-stopped/
* plexWatch (Windows branch) Plex forum thread: http://forums.plexapp.com/index.php/topic/79616-plexwatch-windows-branch/


###Support
-----------
* plexWatch/Web Wiki: https://github.com/ecleese/plexWatchWeb/wiki
* plexWatch/Web Plex forum thread: http://forums.plexapp.com/index.php/topic/82819-plexwatchweb-a-web-front-end-for-plexwatch/


###Features
-----------
* Responsive web design viewable on desktop, tablet and mobile web browsers 

* Themed to complement Plex/Web 

* Easy configuration setup via html form

* Plex Media Server section counts / Total user count

* Current Plex Media Server viewing activity including:
	* number of current users
	* title
	* progress
	* platform
	* user
	* state (playing, paused, buffering, etc)
	* stream type (direct, transcoded)
	* video type & resolution
	* audio type & channel count.
	
* Recently added media and how long ago it was added

* Global watching history charts (hourly, max hourly, daily, monthly)

* Global watching history with search/filtering & dynamic column sorting
	* date
	* user
	* platform
	* ip address (if enabled in plexWatch)
	* title
	* stream information details
	* start time
	* paused duration length
	* stop time
	* duration length
	* percentage completed
	
* full user list with general information and comparison stats

* individual user information
	- username and gravatar (if available)
	- daily, weekly, monthly, all time stats for play count and duration length
	- individual platform stats for each user
	- public ip address history with last seen date and geo tag location 
	- recently watched content
	- watching history
* charts
	- top 10 all time viewed content
	- top 10 viewed movies
	- top 10 viewed tv shows
	- top 10 viewed tv episodes

* content information pages 
	- movies (includes watching history)
	- tv shows (includes top 10 watched episodes)
	- tv seasons
	- tv episodes (includes watching history)


###Requirements
---------------
* Plex Media Server (v0.9.8+) and a PlexPass membership
* plexWatch (v0.1.6+)
* a web server that supports php (apache, nginx, XAMPP, WampServer, EasyPHP, lighttpd, etc)
* php5
* php5-sqlite
* php5-curl
* php5-json


### Install 
-----------

1. Install requirements
2. Download and unzip the plexWatchWeb package.
3. Upload the contents to the desired location on your web server "/var/www/plexWatch"


###Use
------

Navigate to: http://ip-of-web-server/plexWatch

