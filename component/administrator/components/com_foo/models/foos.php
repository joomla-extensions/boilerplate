<?php
/**
 * @package    [PACKAGE_NAME]
 *
 * @author     [AUTHOR] <[AUTHOR_EMAIL]>
 * @copyright  [COPYRIGHT]
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       [AUTHOR_URL]
 */

use Joomla\CMS\MVC\Model\ListModel;

defined('_JEXEC') or die;

/**
 * Foos
 *
 * @package  [PACKAGE_NAME]
 * @since    1.0.0
 */
class FooModelFoos extends ListModel
{
	/**
	 * Constructor.
	 *
	 * @param   array $config An optional associative array of configuration settings.
	 *
	 * @since   1.0.0
	 */
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id',
				'items.id',
				'title',
				'items.title',
				'alias',
				'items.alias',
				'published',
				'items.published',
			);
		}

		parent::__construct($config);
	}

	/**
	 * Method to auto-populate the model state.
	 *
	 * This method should only be called once per instantiation and is designed
	 * to be called on the first call to the getState() method unless the model
	 * configuration flag to ignore the request is set.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @param   string $ordering  An optional ordering field.
	 * @param   string $direction An optional direction (asc|desc).
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	protected function populateState($ordering = 'items.title', $direction = 'ASC')
	{
		parent::populateState($ordering, $direction);
	}

	/**
	 * Method to get a \JDatabaseQuery object for retrieving the data set from a database.
	 *
	 * @return  \JDatabaseQuery  A \JDatabaseQuery object to retrieve the data set.
	 *
	 * @since   1.0.0
	 */
	protected function getListQuery()
	{
		$db    = $this->getDbo();
		$query = parent::getListQuery()
			->select(
				$db->quoteName(
					array(
						'items.id',
						'items.title',
						'items.alias',
						'items.published',
					)
				)
			)
			->from($db->quoteName('#__foo_items', 'items'));

		$search = $this->getState('filter.search');

		if ($search)
		{
			$query->where($db->quoteName('items.title') . ' LIKE ' . $db->quote('%' . $search . '%'));
		}

		$published = $this->getState('filter.published');

		if (is_numeric($published))
		{
			$query->where($db->quoteName('items.published') . ' = ' . (int) $published);
		}
		elseif ($published === '')
		{
			$query->where('(' . $db->quoteName('items.published') . ' = 0 OR ' . $db->quoteName('items.published') . ' = 1)');
		}

		// Add the list ordering clause.
		$orderCol       = $this->state->get('list.ordering', 'items.title');
		$orderDirection = $this->state->get('list.direction', 'ASC');

		$query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirection));

		return $query;
	}
}
