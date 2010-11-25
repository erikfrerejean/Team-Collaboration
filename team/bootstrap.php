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

/**
 * @debug
 * A way to setup the MOD to my *local* environment
 */
define('PHPBB_ROOT_PATH', './../../../Sites/phpbb/moDevCenter/phpBB/');

/*
 * The auto loader
 */
require __DIR__ . '/includes/ClassLoader.php';
$loader = new ClassLoader(__DIR__ . '/includes/', null, 'tc_');
$loader->register();

// A wrapper for phpBB
$phpbb_root_path = $phpEx = '';
$phpbb = new kernal\phpBB($phpbb_root_path, $phpEx);

// Load and initialse phpBB
require PHPBB_ROOT_PATH . 'common.' . PHP_EXT;
$phpbb->setup($auth, $cache, $config, $db, $template, $user);

// The Team Collaboration kernal
$kernal = new kernal\Kernal($phpbb);
