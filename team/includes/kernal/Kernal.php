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
 * The Team Collaboration kernal
 */
class Kernal
{
	/**
	 * phpBB wrapper object
	 * @var phpBB $phpbb
	 */
	public $phpbb = null;

	public function __construct(phpBB $phpbb)
	{
		$this->phpbb = $phpbb;
	}
}
