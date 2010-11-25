<?php
/**
 *
 * @package Team Collaboration
 * @copyright (c) 2010 Erik Frèrejean
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 * Main Team Collaboration configuration file.
 * To configure Team Collaboration, copy/rename this file to
 * `team_config.php`
 */

/**
 */
namespace teamcollaboration;

/**
 * The configurtaion array
 */
$config = array(
	/**
	 * Set the phpBB Root path, this is the `absolute` path from the
	 * directory that contains the Team Collaboration files to directory
	 * in which you've installed phpBB.
	 * This is the directory that contains the phpBB `config.php` file
	 */
	'phpbb_root_path'	=> './../phpbb/',

	/**
	 * Set the Team Collaboration script path, this is the path from
	 * the web root to the Team Collaboration directory, if you for
	 * example installed TC at: `http://www.example.com/team/` than your
	 * script path is: `team`
	 */
	'script_path'	=> 'team',
);
