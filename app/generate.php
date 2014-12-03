<?php
require_once(__DIR__ . '/client/GitHubClient.php');

class GHPageBuilder {

	/** @var GitHubClient $client */
	private $client;
	/** @var array[] $categories*/
	private $categories;
	/** @var string $username */
	private $username;

	/**
	 * Constructor; configures a new GitHubClient object and populates values
	 *  taken from the config array.
	 *
	 * @param array[] config
	 */
	public function __construct( array $config )
	{
		$this->client = new GitHubClient();
		$this->categories = $config['categories'];

		foreach($this->categories as $key => $data)
		{
			$this->categories[$key]['repositories'] = array();
		}

		if( isset($config['username']) ){
			$this->username = $config['username'];
		}
	}


	/**
	 * Retrieves Categories for use in the template file.
	 *
	 * @return array[]
	 */
	public function Categories()
	{
		return $this->categories;
	}


	/**
	 * Retrieves the timestamp for the point at which this script was executed, thus
	 *  the page was generated.
	 *
	 * Yes, we cache the date. This is simply in case it's used multiple times on one
	 *  page. Besides, the actual dates you must likely want are available from the 
	 *  GithubSimpleRepo objects themselves.
	 *
	 * @return timestamp
	 */
	public function Date()
	{
		return time();	
	}


	/**
	 * Executes the script - calling th command line interface to run.
	 */
	public function Execute()
	{
		if(! $this->username ){
			printf("Your github username? ");
			$this->username = $this->getStringValue();
		}

		$this->runCommandLineInterface();
	}

	public function Save($filename = 'index.html')
	{

		printf("Building page content... \n");

		// Load up our template and execute it, whilst saving the output buffer
		ob_start();
		$page = $this;
		require_once(__DIR__ . '/template.php');
		$html = ob_get_contents();
		ob_end_clean();

		printf("Saving page... \n");

		// Write to file
		$fp = fopen($filename, 'w');
		fwrite($fp, $html);
		fclose($fp);

		printf("Page saved!");
	}


	/**
	 * Retrieves the repositories associated with the given user; and then calls the
	 *  process method.
	 */
	private function runCommandLineInterface()
	{
		printf("Connecting to Github and retrieving repositories...\n");
		$repositories = $this->client->repos->listUserRepositories($this->username, 'updated');
		printf("Retrieved repositories!\n");

		$this->processRepositories($repositories);
	}

	/**
	 * Iterate through all the repositories and prompt the user as to whether they
	 *  want the repository contained in their public listing. If they do, prompt
	 *  them to choose a category to display it under.
	 */
	private function processRepositories($repos)
	{
		$numOfCats = count($this->categories);
		$keys = array_keys($this->categories);

		foreach($repos as $repo)
		{
			printf("Output '%s' on repository listing? [y/n]\n", $repo->getName());

			$resp = $this->getBooleanValue();

			if(! $resp ){
				continue;
			}

			printf("Select which category to place this repository under: \n");

			for($i=0;$i<$numOfCats;$i++)
			{
				printf("\t[%d] - %s\n", $i, $keys[$i] );
			}

			$resp = $this->getIntegerValue(0, $numOfCats);

			$this->categories[ $keys[$resp] ]['repositories'][] = $repo;

			printf("Added '%s' to '%s'!\n\n", $repo->getName(), $keys[$resp]);
		}
	}

	private function getBooleanValue()
	{
		$char = '';			

		while(! in_array(
				($char = fgetc(STDIN)),
				['y', 'Y', 'n', 'N']
			)
		);

		return (strtolower($char) == 'y');
	}

	private function getIntegerValue($min = 0, $max)
	{
		$char = '';

		while(!
			is_numeric( $char = fgetc(STDIN) )
			&& (int)$char >= $min
			&& ((int)$char <= $max)
		 );

		return (int)$char;
	}

	private function getStringValue()
	{
		$str = fgets(STDIN);
		return trim($str);
	}

}

require_once(__DIR__ . '/config.php');

$page = new GHPageBuilder( $config );
$page->Execute();
$page->Save();