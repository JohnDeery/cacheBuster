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

use Piwik\Common;
use Piwik\Notification;
use Piwik\Piwik;
use Piwik\Url;

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
		$dirs = glob($dir.SEPARATOR.'tmp'.SEPARATOR.'*' , GLOB_ONLYDIR);
				
		for($i=0; $i < sizeof($dirs); $i++)
		{
			if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
			{
				system("rmdir ".$dirs[$i]." /s /q");
			} else {
				system("rm -rf ".$dirs[$i]);
			}
		}

        $notification = new Notification('The cache has been cleared');
		$notification->context = Notification::CONTEXT_SUCCESS;
		$notification->type = Notification::TYPE_TOAST;
		Notification\Manager::notify('General_CacheCleared', $notification);
		
		Url::redirectToReferrer();
    }
}