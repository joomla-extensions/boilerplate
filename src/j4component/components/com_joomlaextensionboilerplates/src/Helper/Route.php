<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_joomlaextensionboilerplates
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Joomlaextensionboilerplates\Site\Helper;

defined('_JEXEC') or die;

use Joomla\CMS\Categories\CategoryNode;
use Joomla\CMS\Language\Multilanguage;

/**
 * Joomlaextensionboilerplates Component Route Helper
 *
 * @static
 * @package     Joomla.Site
 * @subpackage  com_joomlaextensionboilerplates
 * @since       1.5
 */
abstract class Route
{
	/**
	 * Get the URL route for a joomlaextensionboilerplates from a joomlaextensionboilerplate ID, joomlaextensionboilerplates category ID and language
	 *
	 * @param   integer  $id        The id of the joomlaextensionboilerplates
	 * @param   integer  $catid     The id of the joomlaextensionboilerplates's category
	 * @param   mixed    $language  The id of the language being used.
	 *
	 * @return  string  The link to the joomlaextensionboilerplates
	 *
	 * @since   1.5
	 */
	public static function getJoomlaextensionboilerplatesRoute($id, $catid, $language = 0)
	{
		// Create the link
		$link = 'index.php?option=com_joomlaextensionboilerplates&view=joomlaextensionboilerplate&id=' . $id;

		if ($catid > 1)
		{
			$link .= '&catid=' . $catid;
		}

		if ($language && $language !== '*' && Multilanguage::isEnabled())
		{
			$link .= '&lang=' . $language;
		}

		return $link;
	}

	/**
	 * Get the URL route for a joomlaextensionboilerplates category from a joomlaextensionboilerplates category ID and language
	 *
	 * @param   mixed  $catid     The id of the joomlaextensionboilerplates's category either an integer id or an instance of CategoryNode
	 * @param   mixed  $language  The id of the language being used.
	 *
	 * @return  string  The link to the joomlaextensionboilerplates
	 *
	 * @since   1.5
	 */
	public static function getCategoryRoute($catid, $language = 0)
	{
		if ($catid instanceof CategoryNode)
		{
			$id = $catid->id;
		}
		else
		{
			$id = (int) $catid;
		}

		if ($id < 1)
		{
			$link = '';
		}
		else
		{
			// Create the link
			$link = 'index.php?option=com_joomlaextensionboilerplates&view=category&id=' . $id;

			if ($language && $language !== '*' && Multilanguage::isEnabled())
			{
				$link .= '&lang=' . $language;
			}
		}

		return $link;
	}
}
