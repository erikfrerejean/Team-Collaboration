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
$loader = new ClassLoader(__DIR__ . '/includes/');
$loader->register();

// Load the DI helper
$di = new helpers\DIHelper('TeamServiceContainer', 'teamServiceContainer');
$di->loadDI();
