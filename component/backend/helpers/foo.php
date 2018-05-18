<?php
/**
 * @package    [EXTENSION_NAME]
 *
 * @author     [AUTHOR] <[AUTHOR_EMAIL]>
 * @copyright  [COPYRIGHT]
 * @license    [LICENSE]
 * @link       [AUTHOR_URL]
 */

use Joomla\CMS\Language\Text;

defined('_JEXEC') or die;

/**
 * Foo helper.
 *
 * @package     A package name
 * @since       1.0
 */
class FooHelper
{
	/**
	 * Render submenu.
	 *
	 * @param   string  $vName  The name of the current view.
	 *
	 * @return  void.
	 *
	 * @since   1.0
	 */
	public function addSubmenu($vName)
	{
		JHtmlSidebar::addEntry(Text::_('COM_FOO'), 'index.php?option=com_foo&view=foo', $vName == 'foo');
	}
}
