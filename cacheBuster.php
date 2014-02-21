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

use Piwik\Menu\MenuAdmin;
use Piwik\Option;
use Piwik\Piwik;
use Piwik\SettingsPiwik;
use Piwik\Menu\MenuTop;
use Piwik\Translate;
use Piwik\Version;

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
		If(Piwik::isUserIsSuperUser())
		{
			$urlParams = array('module' => 'Cache Buster', 'action' => 'index');
    		MenuTop::addEntry('cacheBuster', $urlParams, true, 8, $isHTML = false, $tooltip);
		}
	}
}
