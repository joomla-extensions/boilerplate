<?php
/**
 * @package    [PACKAGE_NAME]
 *
 * @author     [AUTHOR] <[AUTHOR_EMAIL]>
 * @copyright  [COPYRIGHT]
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       [AUTHOR_URL]
 */

use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;

defined('_JEXEC') or die;

/**
 * Joomlaextensionboilerplate helper.
 *
 * @package   [PACKAGE_NAME]
 * @since     1.0.0
 */
class JoomlaextensionboilerplateHelper
{
	/**
	 * Render submenu.
	 *
	 * @param   string  $vName  The name of the current view.
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	public function addSubmenu($vName)
	{
		HTMLHelper::_('sidebar.addEntry', Text::_('COM_JOOMLAEXTENSIONBOILERPLATE'), 'index.php?option=com_joomlaextensionboilerplate&view=joomlaextensionboilerplate', $vName === 'joomlaextensionboilerplate');
	}
}
