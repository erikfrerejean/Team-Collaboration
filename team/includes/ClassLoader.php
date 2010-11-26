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
 * The class loader resolves class names to file system paths and loads them if
 * necessary.
 *
 * Classes are resolved based upon the namespace they're in
 * (teamcollaboration\(dir_\)*classname.
 *
 * Classes have to be of the form phpbb_(dir_)*(classpart_)*, so directory names
 * must never contain underscores. Example: phpbb_dir_subdir_class_name is a
 * valid class name, while phpbb_dir_sub_dir_class_name is not.
 *
 * If every part of the class name is a directory, the last directory name is
 * also used as the filename, e.g. phpbb_dir would resolve to dir/dir.php.
 *
 * @package phpBB3
 */
class ClassLoader
{
	private $root_path = '';

	/**
	 * Creates a new phpbb_class_loader, which loads files with the given
	 * file extension from the given phpbb root path.
	 *
	 * @param string $root_path The directory from where shall be included
	 */
	public function __construct($root_path = '')
	{
		if (empty($root_path))
		{
			$this->root_path = __DIR__ . '/';
		}
		else
		{
			$this->root_path = (substr($root_path, -1) === '/') ? $root_path : $root_path . '/';
		}
	}

	/**
	 * Registers the class loader as an autoloader using SPL.
	 */
	public function register()
	{
		spl_autoload_register(array($this, 'loadClass'));
	}

	/**
	 * Removes the class loader from the SPL autoloader stack.
	 */
	public function unregister()
	{
		spl_autoload_unregister(array($this, 'loadClass'));
	}

	/**
	 * Resolves a class name to a path and then includes it.
	 *
	 * @param string $class The class name which is being loaded.
	 */
	public function LoadClass($class)
	{
		// Only load `teamcollaboration\` classes
		$ns = substr($class, 0, 18);
		$cl = substr($class, 18);

		if (substr($ns, 0, 18) !== 'teamcollaboration\\')
		{
			return;
		}

		$path = $this->root_path . str_replace('\\', DIRECTORY_SEPARATOR, $cl) . '.php';

		require $path;
	}
}
