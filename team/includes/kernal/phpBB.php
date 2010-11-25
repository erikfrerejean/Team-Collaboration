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

	/**
	 * Construct the wrapper
	 */
	public function __construct()
	{
		// Set some vars
		define('IN_PHPBB', true);
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
