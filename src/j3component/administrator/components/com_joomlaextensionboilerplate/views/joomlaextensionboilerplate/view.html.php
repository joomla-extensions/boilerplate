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
use Joomla\CMS\Form\Form;
use Joomla\CMS\Helper\ContentHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView;
use Joomla\Registry\Registry;

defined('_JEXEC') or die;

/**
 * Joomlaextensionboilerplate view.
 *
 * @package  [PACKAGE_NAME]
 * @since    1.0.0
 */
class JoomlaextensionboilerplateViewJoomlaextensionboilerplate extends HtmlView
{
	/**
	 * Form with settings
	 *
	 * @var    Form
	 * @since  1.0.0
	 */
	protected $form;

	/**
	 * The item object
	 *
	 * @var    object
	 * @since  1.0.0
	 */
	protected $item;

	/**
	 * The model state
	 *
	 * @var    Registry
	 * @since  1.0.0
	 */
	protected $state;

	/**
	 * Execute and display a template script.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise a JError object.
	 *
	 * @see     fetch()
	 *
	 * @throws  Exception
	 *
	 * @since   1.0.0
	 */
	public function display($tpl = null)
	{
		/** @var JoomlaextensionboilerplatesModelJoomlaextensionboilerplate $model */
		$model       = $this->getModel();
		$this->form  = $model->getForm();
		$this->item  = $model->getItem();
		$this->state = $model->getState();

		// Show the toolbar
		$this->toolbar();

		// Display it all
		return parent::display($tpl);
	}

	/**
	 * Displays a toolbar for a specific page.
	 *
	 * @return  void
	 *
	 * @throws  Exception
	 *
	 * @since   1.0.0
	 */
	private function toolbar()
	{
		Factory::getApplication()->input->set('hidemainmenu', true);

		$canDo = ContentHelper::getActions('com_joomlaextensionboilerplate');
		$isNew = ($this->item->id == 0);

		JToolBarHelper::title(Text::_('COM_JOOMLAEXTENSIONBOILERPLATE_TITLE_JOOMLAEXTENSIONBOILERPLATE'));

		// If not checked out, can save the item.
		if ($canDo->get('core.edit') || ($canDo->get('core.create')))
		{
			JToolBarHelper::apply('joomlaextensionboilerplate.apply', 'JTOOLBAR_APPLY');
			JToolBarHelper::save('joomlaextensionboilerplate.save', 'JTOOLBAR_SAVE');
		}

		if ($canDo->get('core.create'))
		{
			JToolBarHelper::custom('joomlaextensionboilerplate.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
		}

		// If an existing item, can save to a copy.
		if (!$isNew && $canDo->get('core.create'))
		{
			JToolBarHelper::custom('joomlaextensionboilerplate.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
		}

		if (empty($this->item->id))
		{
			JToolBarHelper::cancel('joomlaextensionboilerplate.cancel', 'JTOOLBAR_CANCEL');
		}
		else
		{
			JToolBarHelper::cancel('joomlaextensionboilerplate.cancel', 'JTOOLBAR_CLOSE');
		}
	}
}
