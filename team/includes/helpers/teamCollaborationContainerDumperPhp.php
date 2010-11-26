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
use sfServiceContainerDumperPhp;

/**
 * An class that extends the `sfServiceContainerDumperPhp`
 * so that we can inject some own code into the outputted
 * php file without having the need to hack it
 */
class teamCollaborationContainerDumperPhp extends sfServiceContainerDumperPhp
{
	protected function startClass($class, $baseClass)
	{
		return <<<EOF
<?php

namespace teamcollaboration\helpers;
use $baseClass;

class $class extends $baseClass
{
  protected \$shared = array();

EOF;
	}
}
