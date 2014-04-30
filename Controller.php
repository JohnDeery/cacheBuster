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
use Piwik\Filesystem;
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
		$dir = explode(DIRECTORY_SEPARATOR, $_SERVER['SCRIPT_FILENAME']);
		array_pop($dir);
		$dir = implode(DIRECTORY_SEPARATOR, $dir);
		$dirs = glob($dir.DIRECTORY_SEPARATOR.'tmp'.DIRECTORY_SEPARATOR.'*' , GLOB_ONLYDIR);

		for($i=0; $i < sizeof($dirs); $i++)
		{
			if(strstr($dirs[$i], 'sessions'))
				continue;
			Filesystem::unlinkRecursive($dirs[$i], TRUE);
		}

		$notification = new Notification("The cache has been cleared!");
		//$notification->raw		= true;
		$notification->context	= Notification::CONTEXT_SUCCESS;
		$notification->type		= Notification::TYPE_TOAST;
		Notification\Manager::notify('cacheBuster_CacheCleared', $notification);
		
		Url::redirectToReferrer();
    }
}