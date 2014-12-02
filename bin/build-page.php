<?php
require_once(__DIR__ . '/client/GitHubClient.php');

$owner = 'fmorrow';
$repo = 'github-php-client';

$client = new GitHubClient();
$repos = $client->repos->listUserRepositories($owner, 'updated');

$reposToPost = array(
		'web'	=> [],
		'other'	=> []
	);

/*
** Ahoy there - quite possibly the ugliest code I've ever written.
**  Refactor. Be imaginate with array indexes and stuff. :)
*/ 
foreach($repos as $repo)
{
	printf("Output %s? (y/n) ", $repo->getName());

	while(! in_array(
				($line = fgetc(STDIN)),
				['y', 'Y', 'n', 'N']
			)
		);

	if( strtolower($line) != 'y' ){
		continue;
	}

	printf("Please select one of the following options:\n");
	printf("[1] Web Project\n");
	printf("[2] Other Project\n");

	while(! in_array(
				($line = fgetc(STDIN)),
				['1', '2']
			)
		);

	$reposToPost[
			($line == '1') ? 'web' : 'other'
		][] = $repo;
}


var_dump( $reposToPost );
