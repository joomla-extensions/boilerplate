<?php
/**
 * @package    [PACKAGE_NAME]
 *
 * @author     [AUTHOR] <[AUTHOR_EMAIL]>
 * @copyright  [COPYRIGHT]
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       [AUTHOR_URL]
 */

defined('_JEXEC') or die;

use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Object\CMSObject;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Session\Session;

/**
 * Foo plugin.
 *
 * @package  [PACKAGE_NAME]
 * @since    1.0
 */
class plgButtonFoo extends CMSPlugin
{
	/**
	 * Application object
	 *
	 * @var    CMSApplication
	 * @since  1.0
	 */
	protected $app;

	/**
	 * Database object
	 *
	 * @var    JDatabaseDriver
	 * @since  1.0
	 */
	protected $db;

	/**
	 * Affects constructor behavior. If true, language files will be loaded automatically.
	 *
	 * @var    boolean
	 * @since  1.0
	 */
	protected $autoloadLanguage = true;

	/**
	 * Display the button
	 *
	 * @param   string $name The name of the button to add
	 *
	 * @return  CMSObject  The button options as JObject
	 *
	 * @since   1.0
	 */
	public function onDisplay($name)
	{
		$link = 'index.php?option=com_foo&amp;view=foo&amp;layout=modal&amp;tmpl=component&amp;'
			. Session::getFormToken() . '=1&amp;editor=' . $name;

		$button = new CMSObject;
		$button->modal = true;
		$button->class = 'btn btn-secondary';
		$button->link = $link;
		$button->text = Text::_('PLG_EDITORSXTD_FOO_BUTTON_FOO');
		$button->name = 'file-add';
		$button->options = array(
			'height'     => '300px',
			'width'      => '800px',
			'bodyHeight' => '70',
			'modalWidth' => '80',
		);

		return $button;
	}
}
