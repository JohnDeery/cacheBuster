<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 * @category Piwik_Plugins
 * @package cacheBuster
 */
namespace Piwik\Plugins\cacheBuster;

use Piwik\Piwik;
use Piwik\Menu\MenuTop;

/**
 * @package cacheBuster
 */
class cacheBuster extends \Piwik\Plugin
{
    /**
     * @see Piwik\Plugin::getListHooksRegistered
     */
    public function getListHooksRegistered()
    {
        return array(
            'Menu.Top.addItems' => 'addTopMenu',
        );
    }
	
	public function addTopMenu()
	{
		if(Piwik::hasUserSuperUserAccess())
		{
			$urlParams = array('module' => 'cacheBuster', 'action' => 'index');
    		MenuTop::addEntry('cacheBuster', $urlParams, true, 8, $isHTML = false);
		}
	}
}
