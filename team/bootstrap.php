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

// Register the DI Auto loader
require __DIR__ . '/includes/vendor/di/lib/sfServiceContainerAutoloader.php';
\sfServiceContainerAutoloader::register();

// The auto loader
require __DIR__ . '/includes/ClassLoader.php';
$loader = new ClassLoader(__DIR__ . '/includes/', null, 'tc_');
$loader->register();

// Init the DI container
$di = new \sfServiceContainerBuilder(array(
	// The TC Kernal
	'kernal.class'		=> 'teamcollaboration\kernal\Kernal',
	'kernal.options'	=> array('phpbb', 'url'),

	// The URL handler
	'url.class'			=> 'teamcollaboration\kernal\URL',

	// The phpBB wrapper
	'phpbb.class'		=> 'teamcollaboration\kernal\phpBB',
));

// Register phpBB
$di->register('phpbb', '%phpbb.class%');

// A small hack to make sure that phpBB understand our paths
$phpbb_root_path = $di->phpbb->phpbb_root_path;
$phpEx = $di->phpbb->phpEx;

// Setup phpBB
require $phpbb_root_path . 'common.' . $phpEx;
$di->phpbb->setup($auth, $cache, $config, $db, $template, $user);

// Register the URL handler
$di->register('url', '%url.class%');

// Register the kernal
$di->register('kernal', '%kernal.class%')->
	addArgument(new \sfServiceReference('phpbb'))->
	addArgument(new \sfServiceReference('url'));
