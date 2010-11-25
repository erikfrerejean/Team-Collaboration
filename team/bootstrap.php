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
namespace teamcollaboration;

// The auto loader
require __DIR__ . '/includes/ClassLoader.php';
$loader = new ClassLoader(__DIR__ . '/includes/', null, 'tc_');
$loader->register();

// Init URL handler
$url = new kernal\URL();

// The Team Collaboration kernal
$kernal = new kernal\Kernal($url);

// A wrapper for phpBB
$phpbb = new kernal\phpBB();

// Make the paths compatible
$phpbb_root_path = PHPBB_ROOT_PATH;
$phpEx = PHP_EXT;

// Load and initialse phpBB
require PHPBB_ROOT_PATH . 'common.' . PHP_EXT;
$phpbb->setup($auth, $cache, $config, $db, $template, $user);

// Inject phpBB wrapper
$kernal->set_phpbb($phpbb);

// Setup the kernal
$kernal->setup();