# Dynamic Web Applications - Project P4

Project P4 is bringing together a fully functioning web application that uses PHP, Laravel, and mySQL database. 

1. Creating a new Laravel web application.

   1.1 "Clap Events" web application is focused for parent who want to track their kid's accomplishments. This website gives the user to create profile for themself, their children
	and the events that they are participating. Parents have the flexibility to record events that happened in past or create events that are upcoming to tracks. The events can be anything that he child
	participates in, it could be an academic event or sports or something else. 

2. Installing and using Composer packages. 
	
	2.1 kartik-v/bootstrap-fileinput for uploading profile picture.	

3. Routing basics - Used routes with basic routes parameters passed to the controller. The controller have the methods implemented that was reffered in the routes file. 
	HTTP request is used to get current instance of request and validation is applied before executing post.
	
4. Views: Blade templates used for rendering of web pages. 
	
	4.1 In addition used 
		
		4.1.1 Bootstrap for the advanced styling and faster responsiveness 
		
		4.1.2 jQuery is used to handle dynamic content delivery
				
				4.4.2.1 handle profile picture upload.
				
				4.4.2.2 handle accordion toggle event for showing different event a child participate.
	
5. Database CRUD operation: Performed for the following action upon 3 tables (Users, Children and Events)
	
	5.1 A new user is created when they register through the site and they can update their profile with profile picture
	
	5.2 Every logged user can add new child, edit and remove from their profile
	
	5.3 Events can be created, updated, deleted and displayed(read). 

6. References
	6.1 Foobook web application from this course
	6.2 Image for default user profile picture is  from www.relevantmagazine.com

7. Deploying a Laravel app on a live server. 

8. Users that can be used to login with password helloworld:
	
	8.1 jill@harvard.edu
	8.2 jamal@harvard.edu

#### NOTE: The profile picture will be stored based on the user id under public/assets/uploads/ . For fresh install, make sure that directory is writeable.

## Live URL of the project

Live URL of the project can be found [here](http://P4.chanchika.me/).

## Demo

Link to screencast demo can be found [here](http://www.screencast.com/users/Chithra_Jayakumar/folders/DWA/media/09744ab3-920c-41da-a499-38cf0c08b860).
