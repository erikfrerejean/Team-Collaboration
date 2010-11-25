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

	/**
	 * The URL handler
	 * @var URL $url
	 */
	public $url = null;

	public function __construct(phpBB $phpbb, URL $url)
	{
		$this->phpbb	= $phpbb;
		$this->url		= $url;

		// Setup the URL handler
		// @todo hardcoded for the time being
		$this->url->root_url = generate_board_url(true) . '/teamcollaboration/team/';
		$this->url->decode_url('teamcollaboration/team/');
	}
}
