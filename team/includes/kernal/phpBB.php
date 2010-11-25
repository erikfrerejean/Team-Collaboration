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

/**
 * A wrapper for phpBB
 */
class phpBB
{
	/**@#+
	 * @var mixed all the phpBB common used objects
	 */
	public $auth		= null;
	public $cache		= null;
	public $config		= array();
	public $db			= null;
	public $template	= null;
	public $user		= null;
	/**@#-*/

	/**@#+
	 * phpBB paths
	 */
	public $phpbb_root_path	= '';
	public $phpEx			= '';
	/**@#-*/

	/**
	 * Construct the wrapper
	 * @param string $phpbb_root_path Variable will be filled with the phpBB root path
	 * @param string $phpEx           Variable will be filled with phpExt
	 */
	public function __construct()
	{
		define('IN_PHPBB', true);
		
		// Set the vars
		// @todo for now hardcoded
		$this->phpbb_root_path = (!defined('PHPBB_ROOT_PATH')) ? './../' : PHPBB_ROOT_PATH;
		$this->phpEx = 'php';
	}

	public function setup(\auth $auth, \acm $cache, array $config, \dbal $db, \template $template, \session $user)
	{
		// Set the classes
		$this->auth		= $auth;
		$this->cache	= $cache;
		$this->config	= $config;
		$this->db		= $db;
		$this->template	= $template;
		$this->user		= $user;

		// Setup the user
		$this->user->session_begin();
		$this->auth->acl($this->user->data);
		$this->user->setup();
	}
}
