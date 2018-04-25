# Github Listing Generator (Unmaintained.)

A quick'n'dirty PHP static site generator for creating a "*Github Pages*" page. You can see what it's capable of overe at my [Github Pages](http://github.fergus.london).

## Configuration

Configuration is staggeringly simple.

### Edit config.php

Populate the array with your Github username, and ```categories``` with an array of categories you'd like to split your repositories up in to.

Additionally, add any meta-data you'd like to add to these categories to this array, and it will be possible to pull them through on the template.

Perhaps try running the command with my configuration after browsing the source code, this should show you exactly what it's doing.

### Edit template.php

Well, you wouldn't want to be using my one would you?


## Using

As simple as one command.

    Ferguss-MacBook-Air:gh-site fergusmorrow$ php app/generate.php 

	Connecting to Github and retrieving repositories...
	Retrieved repositories!
	Output 'ardularm' on repository listing? [y/n]
	y
	Select which category to place this repository under: 
		[0] - Web
		[1] - Other
	1
	Added 'ardularm' to 'Other'!

	Output 'C-Tips-and-Tricks' on repository listing? [y/n]
	y
	Select which category to place this repository under: 
		[0] - Web
		[1] - Other
	1
	Added 'C-Tips-and-Tricks' to 'Other'!

	Output 'Cordova-Plugins' on repository listing? [y/n]
	y
	Select which category to place this repository under: 
		[0] - Web
		[1] - Other
	1
	Added 'Cordova-Plugins' to 'Other'!

	Output 'fmorrow.github.io' on repository listing? [y/n]
	y
	Select which category to place this repository under: 
		[0] - Web
		[1] - Other
	0
	Added 'fmorrow.github.io' to 'Web'!
	
	< ... snip ... >

	Building page content... 
	Saving page... 
	Page saved!Ferguss-MacBook-Air:gh-site fergusmorrow$ clear
