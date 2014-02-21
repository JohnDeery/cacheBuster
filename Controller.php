<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 * @category Piwik_Plugins
 * @package ClearCache
 */
namespace Piwik\Plugins\cacheBuster;

use Piwik;
use Piwik\Url;
use Piwik\View;

/**
 *
 * @package ClearCache
 */
class Controller extends \Piwik\Plugin\Controller
{
	public function index()
    {
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
		{
			define("SEPARATOR", "\\");
		}
		else 
		{
			define("SEPARATOR", "/");
		}
	
		$dir = explode(SEPARATOR, $_SERVER['SCRIPT_FILENAME']);
		array_pop($dir);
		$dir = implode(SEPARATOR, $dir);
		$directories = glob($dir.SEPARATOR.'tmp'.SEPARATOR.'*' , GLOB_ONLYDIR);
				
		for($i=0; $i < sizeof($dirs); $i++)
		{
			if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
			{
				system("rmdir ".$directories[$i]." /s /q");
			} else {
				system("rm -rf ".$directories[$i]);
			}
		}
		Url::redirectToReferrer();
    }
}