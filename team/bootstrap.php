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

// The Team Collaboration Auto Loader
require __DIR__ . '/includes/ClassLoader.php';
$loader = new ClassLoader();
$loader->register();

// Load the DI helper
$di = new helpers\DIHelper('TeamServiceContainer', 'teamServiceContainer');
$di->loadDI();

// Setup phpBB
$phpbb_root_path = $di->phpbb->phpbb_root_path;
$phpEx = $di->phpbb->phpEx;
require PHPBB_ROOT_PATH . 'common.php';
$di->phpbb->setup($auth, $cache, $config, $db, $template, $user);
