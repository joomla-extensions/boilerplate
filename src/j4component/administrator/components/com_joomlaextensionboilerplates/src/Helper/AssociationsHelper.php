<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_joomlaextensionboilerplates
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Joomlaextensionboilerplates\Administrator\Helper;

defined('_JEXEC') or die;

use Joomla\CMS\Association\AssociationExtensionHelper;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Table\Table;
use Joomla\Component\Joomlaextensionboilerplates\Site\Helper\AssociationHelper;

/**
 * Content associations helper.
 *
 * @since  1.0.0
 */
class AssociationsHelper extends AssociationExtensionHelper
{
	/**
	 * The extension name
	 *
	 * @var     array $extension
	 *
	 * @since   1.0.0
	 */
	protected $extension = 'com_joomlaextensionboilerplates';

	/**
	 * Array of item types
	 *
	 * @var     array $itemTypes
	 *
	 * @since   1.0.0
	 */
	protected $itemTypes = ['joomlaextensionboilerplate', 'category'];

	/**
	 * Has the extension association support
	 *
	 * @var     boolean $associationsSupport
	 *
	 * @since   1.0.0
	 */
	protected $associationsSupport = true;

	/**
	 * Method to get the associations for a given item.
	 *
	 * @param   integer  $id    Id of the item
	 * @param   string   $view  Name of the view
	 *
	 * @return  array   Array of associations for the item
	 *
	 * @since  1.0.0
	 */
	public function getAssociationsForItem($id = 0, $view = null)
	{
		return AssociationHelper::getAssociations($id, $view);
	}

	/**
	 * Get the associated items for an item
	 *
	 * @param   string  $typeName  The item type
	 * @param   int     $id        The id of item for which we need the associated items
	 *
	 * @return  array
	 *
	 * @since   1.0.0
	 */
	public function getAssociations($typeName, $id)
	{
		$type = $this->getType($typeName);

		$context    = $this->extension . '.item';
		$catidField = 'catid';

		if ($typeName === 'category')
		{
			$context    = 'com_categories.item';
			$catidField = '';
		}

		// Get the associations.
		$associations = Associations::getAssociations(
			$this->extension,
			$type['tables']['a'],
			$context,
			$id,
			'id',
			'alias',
			$catidField
		);

		return $associations;
	}

	/**
	 * Get item information
	 *
	 * @param   string  $typeName  The item type
	 * @param   int     $id        The id of item for which we need the associated items
	 *
	 * @return  Table|null
	 *
	 * @since   1.0.0
	 */
	public function getItem($typeName, $id)
	{
		if (empty($id))
		{
			return null;
		}

		$table = null;

		switch ($typeName)
		{
			case 'joomlaextensionboilerplate':
				$table = Table::getInstance('JoomlaextensionboilerplateTable',
					'Joomla\\Component\\Joomlaextensionboilerplates\\Administrator\\Table\\');
				break;

			case 'category':
				$table = Table::getInstance('Category');
				break;
		}

		if (empty($table))
		{
			return null;
		}

		$table->load($id);

		return $table;
	}

	/**
	 * Get information about the type
	 *
	 * @param   string  $typeName  The item type
	 *
	 * @return  array  Array of item types
	 *
	 * @since   1.0.0
	 */
	public function getType($typeName = '')
	{
		$fields  = $this->getFieldsTemplate();
		$tables  = [];
		$joins   = [];
		$support = $this->getSupportTemplate();
		$title   = '';

		if (in_array($typeName, $this->itemTypes))
		{
			switch ($typeName)
			{
				case 'joomlaextensionboilerplate':
					$fields['title'] = 'a.name';
					$fields['state'] = 'a.published';

					$support['state']     = true;
					$support['acl']       = true;
					$support['category']  = true;
					$support['save2copy'] = true;

					$tables = [
						'a' => '#__joomlaextensionboilerplates_details',
					];

					$title = 'joomlaextensionboilerplate';
					break;

				case 'category':
					$fields['created_user_id'] = 'a.created_user_id';
					$fields['ordering']        = 'a.lft';
					$fields['level']           = 'a.level';
					$fields['catid']           = '';
					$fields['state']           = 'a.published';

					$support['state']    = true;
					$support['acl']      = true;
					$support['checkout'] = false;
					$support['level']    = false;

					$tables = [
						'a' => '#__categories',
					];

					$title = 'category';
					break;
			}
		}

		return [
			'fields'  => $fields,
			'support' => $support,
			'tables'  => $tables,
			'joins'   => $joins,
			'title'   => $title,
		];
	}

	/**
	 * Get default values for fields array
	 *
	 * @return  array
	 *
	 * @since   1.0.0
	 */
	protected function getFieldsTemplate()
	{
		return [
			'id'       => 'a.id',
			'title'    => 'a.title',
			'alias'    => 'a.alias',
			//	'ordering'            => 'a.ordering',
			'menutype' => '',
			'level'    => '',
			'catid'    => 'a.catid',
			'language' => 'a.language',
			'access'   => 'a.access',
			'state'    => 'a.state',
			//	'created_user_id'     => 'a.created_by',
			//	'checked_out'         => 'a.checked_out',
			//	'checked_out_time'    => 'a.checked_out_time'
		];
	}
}

