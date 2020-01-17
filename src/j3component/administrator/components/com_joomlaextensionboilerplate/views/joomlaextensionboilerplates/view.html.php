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
use Joomla\CMS\Helper\ContentHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\Pagination\Pagination;
use Joomla\Registry\Registry;

defined('_JEXEC') or die;

/**
 * Joomlaextensionboilerplate view.
 *
 * @package  [PACKAGE_NAME]
 * @since    1.0.0
 */
class JoomlaextensionboilerplateViewJoomlaextensionboilerplates extends HtmlView
{
	/**
	 * Array with profiles
	 *
	 * @var    array
	 * @since  1.1.0.0
	 */
	protected $items;

	/**
	 * The model state
	 *
	 * @var    Registry
	 * @since  1.0.0
	 */
	protected $state;

	/**
	 * Pagination object
	 *
	 * @var    Pagination
	 * @since  1.0.0
	 */
	protected $pagination;

	/**
	 * Companies helper
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
	 * Form with filters
	 *
	 * @var    array
	 * @since  1.0.0
	 */
	public $filterForm = array();

	/**
	 * List of active filters
	 *
	 * @var    array
	 * @since  1.0.0
	 */
	public $activeFilters = array();

	/**
	 * Actions registry
	 *
	 * @var    Registry
	 * @since  1.0.0
	 */
	protected $canDo;

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
		/** @var JoomlaextensionboilerplateModelJoomlaextensionboilerplates $model */
		$model               = $this->getModel();
		$this->items         = $model->getItems();
		$this->state         = $model->getState();
		$this->pagination    = $model->getPagination();
		$this->filterForm    = $model->getFilterForm();
		$this->activeFilters = $model->getActiveFilters();
		$this->canDo         = ContentHelper::getActions('com_joomlaextensionboilerplate');

		// Show the toolbar
		$this->toolbar();

		// Show the sidebar
		$this->helper = new JoomlaextensionboilerplateHelper;
		$this->helper->addSubmenu('joomlaextensionboilerplates');
		$this->sidebar = JHtmlSidebar::render();

		// Display it all
		return parent::display($tpl);
	}

	/**
	 * Displays a toolbar for a specific page.
	 *
	 * @return  void.
	 *
	 * @since   1.0.0
	 */
	private function toolbar()
	{
		JToolBarHelper::title(Text::_('COM_JOOMLAEXTENSIONBOILERPLATE_JOOMLAEXTENSIONBOILERPLATE'), '');

		if ($this->canDo->get('core.create'))
		{
			JToolbarHelper::addNew('joomlaextensionboilerplate.add');
		}

		if ($this->canDo->get('core.edit') || $this->canDo->get('core.edit.own'))
		{
			JToolbarHelper::editList('joomlaextensionboilerplate.edit');
		}

		if ($this->canDo->get('core.edit.state'))
		{
			JToolbarHelper::publish('joomlaextensionboilerplates.publish', 'JTOOLBAR_PUBLISH', true);
			JToolbarHelper::unpublish('joomlaextensionboilerplates.unpublish', 'JTOOLBAR_UNPUBLISH', true);
			JToolbarHelper::archiveList('joomlaextensionboilerplates.archive');
		}

		if ($this->state->get('filter.published') == -2 && $this->canDo->get('core.delete'))
		{
			JToolbarHelper::deleteList('JGLOBAL_CONFIRM_DELETE', 'joomlaextensionboilerplates.delete', 'JTOOLBAR_EMPTY_TRASH');
		}
		elseif ($this->canDo->get('core.edit.state'))
		{
			JToolbarHelper::trash('joomlaextensionboilerplates.trash');
		}

		// Options button.
		if (Factory::getUser()->authorise('core.admin', 'com_joomlaextensionboilerplate'))
		{
			JToolBarHelper::preferences('com_joomlaextensionboilerplate');
		}
	}
}
