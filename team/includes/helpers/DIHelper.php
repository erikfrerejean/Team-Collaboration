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
namespace teamcollaboration\helpers;
use sfServiceContainerBuilder;
use sfServiceContainerLoaderFileXml;

class DIHelper
{
	/**
	 * The DI object
	 * @var mixed $di
	 */
	private $di = null;

	/**
	 * The class in the generated file
	 * @var string $di_class
	 */
	private $di_class = '';

	/**
	 * The file that holds the generated php file
	 * @var string $di_file
	 */
	private $di_file = '';

	/**
	 * The config .xml, must be in the `config` directory
	 * @var string $di_xml
	 */
	private $di_xml = '';

	/**
	 * Setup the helper
	 */
	public function __construct($classname, $di_xml)
	{
		$this->di_class	= $classname;
		$this->di_xml	= __DIR__ . '/../../config/' . $this->di_xml . ((substr($di_xml, -4) == '.xml') ? $di_xml : $di_xml . '.xml');
		$this->di_file	= sys_get_temp_dir() . sha1_file($this->di_xml) . '.php';

		// Register the DI Auto loader
		if (!class_exists('sfServiceContainerAutoloader'))
		{
			require __DIR__ . '/../vendor/di/lib/sfServiceContainerAutoloader.php';
			\sfServiceContainerAutoloader::register();
		}
	}

	/**
	 * Load the DI Container
	 */
	public function loadDI()
	{
		if (file_exists($this->di_file))
		{
			require $this->di_file;
			$this->di = new TeamServiceContainer();
		}
		else
		{
			// Generate from the .xml
			$this->di = new sfServiceContainerBuilder();
			$di_loader = new sfServiceContainerLoaderFileXml($this->di);
			$di_loader->load($this->di_xml);

			// Write the php file
			$dumper	= new teamCollaborationContainerDumperPhp($this->di);

			// Store
			file_put_contents($this->di_file, $dumper->dump(array('class' => $this->di_class)));
		}
	}

	/**
	 * Get one of the objects
	 * @param  string $var The requested var
	 * @return mixed  The DI Object
	 */
	public function __get($var)
	{
		if (isset($this->di->$var))
		{
			return $this->di->$var;
		}

		return null;
	}
}
