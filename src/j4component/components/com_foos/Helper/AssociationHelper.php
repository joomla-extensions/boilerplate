<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_joomlathings
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Joomlathings\Site\Helper;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Associations;
use Joomla\Component\Categories\Administrator\Helper\CategoryAssociationHelper;
use Joomla\Component\Joomlathings\Site\Helper\Route as JoomlathingsHelperRoute;

/**
 * Joomlathings Component Association Helper
 *
 * @since  3.0
 */
abstract class AssociationHelper extends CategoryAssociationHelper
{
	/**
	 * Method to get the associations for a given item
	 *
	 * @param   integer  $id    Id of the item
	 * @param   string   $view  Name of the view
	 *
	 * @return  array   Array of associations for the item
	 *
	 * @since  3.0
	 */
	public static function getAssociations($id = 0, $view = null)
	{
		$jinput = Factory::getApplication()->input;
		$view = $view ?? $jinput->get('view');
		$id = empty($id) ? $jinput->getInt('id') : $id;

		if ($view === 'joomlathings')
		{
			if ($id)
			{
				$associations = Associations::getAssociations('com_joomlathings', '#__joomlathings_details', 'com_joomlathings.item', $id);

				$return = array();

				foreach ($associations as $tag => $item)
				{
					$return[$tag] = JoomlathingsHelperRoute::getJoomlathingsRoute($item->id, (int) $item->catid, $item->language);
				}

				return $return;
			}
		}

		if ($view === 'category' || $view === 'categories')
		{
			return self::getCategoryAssociations($id, 'com_joomlathings');
		}

		return array();

	}
}
