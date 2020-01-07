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
use Joomla\CMS\Filter\OutputFilter;
use Joomla\CMS\Form\Form;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Model\AdminModel;
use Joomla\CMS\Table\Table;
use Joomla\String\StringHelper;

defined('_JEXEC') or die;

/**
 * Joomlathing
 *
 * @package  [PACKAGE_NAME]
 * @since    1.0.0
 */
class JoomlathingsModelJoomlathing extends AdminModel
{
	/**
	 * @var   string  The prefix to use with controller messages.
	 *
	 * @since 1.0.0
	 */
	protected $text_prefix = 'COM_JOOMLATHING';

	/**
	 * Method to get the record form.
	 *
	 * @param   array    $data      An optional array of data for the form to interrogate.
	 * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  Form|boolean    A Form object on success, false on failure
	 * @since   1.0.0
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_joomlathing.joomlathing', 'joomlathing', array('control' => 'jform', 'load_data' => $loadData));

		if (empty($form))
		{
			return false;
		}

		return $form;
	}
	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return    mixed    The data for the form.
	 *
	 * @throws  Exception
	 *
	 * @since   1.0.0
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = Factory::getApplication()->getUserState('com_joomlathing.edit.joomlathing.data', array());

		if (empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}

	/**
	 * Method to save the form data.
	 *
	 * @param   array $data The form data.
	 *
	 * @return  boolean  True on success, False on error.
	 *
	 * @throws  Exception
	 *
	 * @since   1.0.0
	 */
	public function save($data)
	{
		// Generate an alias if needed
		if ($data['alias'] == null)
		{
			if (Factory::getConfig()->get('unicodeslugs') == 1)
			{
				$data['alias'] = OutputFilter::stringURLUnicodeSlug($data['title']);
			}
			else
			{
				$data['alias'] = OutputFilter::stringURLSafe($data['title']);
			}

			$table = Table::getInstance('Joomlathing', 'Table');

			if ($table->load(array('alias' => $data['alias'])))
			{
				$msg = Text::_('COM_JOOMLATHING_SAVE_WARNING');
			}

			list($title, $alias) = $this->generateNewTitle(0, $data['alias'], $data['title']);

			$data['alias'] = $alias;

			if (isset($msg))
			{
				Factory::getApplication()->enqueueMessage($msg, 'warning');
			}
		}

		return parent::save($data);
	}

	/**
	 * Method to change the title & alias.
	 *
	 * @param   integer $category_id The id of the category.
	 * @param   string  $alias       The alias.
	 * @param   string  $title       The title.
	 *
	 * @return   array  Contains the modified title and alias.
	 *
	 * @throws   Exception
	 *
	 * @since    1.0.0
	 */
	protected function generateNewTitle($category_id, $alias, $title)
	{
		// Alter the title & alias
		$table = $this->getTable();

		while ($table->load(array('alias' => $alias)))
		{
			$title = StringHelper::increment($title);
			$alias = StringHelper::increment($alias, 'dash');
		}

		return array($title, $alias);
	}
}
