<?php
/**
 *
 * @package Team Collaboration
 * @copyright (c) 2010 Erik Frèrejean
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

/**
 */
namespace teamcollaboration\kernal;
use teamcollaboration;

/**
 * The Team Collaboration kernal
 */
class Kernal
{
	/**
	 * The Team Collaboration config array
	 * @var Array $config
	 */
	public $config = array();

	/**
	 * phpBB wrapper object
	 * @var phpBB $phpbb
	 */
	public $phpbb = null;

	/**
	 * The URL handler
	 * @var URL $url
	 */
	public $url = null;

	public function __construct(URL $url)
	{
		$this->url		= $url;

		// Read the configuration file
		if (!file_exists(__DIR__ . '/../../team_config.php'))
		{
			trigger_error('Couldn\'t read the Team Collaboration configuration file. Make sure that you\'ve correctly installed Team Collaboration!');
		}
		include(__DIR__ . '/../../team_config.php');
		$this->config = $config;

		// Set the phpBB root paths
		define('PHPBB_ROOT_PATH', $this->config['phpbb_root_path']);
		define('PHP_EXT', 'php');
	}

	public function setup()
	{
		// Setup the URL handler
		$this->url->root_url = generate_board_url(true) . "/{$this->config['script_path']}/";
		$this->url->decode_url("{$this->config['script_path']}/");
	}

	public function set_phpbb(phpBB $phpbb)
	{
		$this->phpbb = $phpbb;
	}
}
