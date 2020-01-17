<?php
/**
 * @package    [PACKAGE_NAME]
 *
 * @author     [AUTHOR] <[AUTHOR_EMAIL]>
 * @copyright  [COPYRIGHT]
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       [AUTHOR_URL]
 */

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Toolbar\ToolbarHelper;

defined('_JEXEC') or die;

/**
 * Joomlaextensionboilerplate view.
 *
 * @package   [PACKAGE_NAME]
 * @since     1.0.0
 */
class JoomlaextensionboilerplateViewJoomlaextensionboilerplate extends HtmlView
{
	/**
	 * Joomlaextensionboilerplate helper
	 *
	 * @var    JoomlaextensionboilerplateHelper
	 * @since  1.0.0
	 */
	protected $helper;

	/**
	 * The sidebar to show
	 *
	 * @var    string
	 * @since  1.0.0
	 */
	protected $sidebar = '';

	/**
	 * Execute and display a template script.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise a JError object.
	 *
	 * @see     fetch()
	 * @since   1.0.0
	 */
	public function display($tpl = null)
	{
		// Show the toolbar
		$this->toolbar();

		// Show the sidebar
		$this->helper = new JoomlaextensionboilerplateHelper;
		$this->helper->addSubmenu('joomlaextensionboilerplate');
		$this->sidebar = HTMLHelper::_('sidebar.render');

		// Display it all
		return parent::display($tpl);
	}

	/**
	 * Displays a toolbar for a specific page.
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	private function toolbar()
	{
		ToolBarHelper::title(Text::_('COM_JOOMLAEXTENSIONBOILERPLATE'), '');

		// Options button.
		if (Factory::getUser()->authorise('core.admin', 'com_joomlaextensionboilerplate'))
		{
			ToolBarHelper::preferences('com_joomlaextensionboilerplate');
		}
	}
}
