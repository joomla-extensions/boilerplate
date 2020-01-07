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

use Joomla\CMS\Categories\CategoryNode;
use Joomla\CMS\Language\Multilanguage;

/**
 * Joomlathings Component Route Helper
 *
 * @static
 * @package     Joomla.Site
 * @subpackage  com_joomlathings
 * @since       1.5
 */
abstract class Route
{
	/**
	 * Get the URL route for a joomlathings from a joomlathing ID, joomlathings category ID and language
	 *
	 * @param   integer  $id        The id of the joomlathings
	 * @param   integer  $catid     The id of the joomlathings's category
	 * @param   mixed    $language  The id of the language being used.
	 *
	 * @return  string  The link to the joomlathings
	 *
	 * @since   1.5
	 */
	public static function getJoomlathingsRoute($id, $catid, $language = 0)
	{
		// Create the link
		$link = 'index.php?option=com_joomlathings&view=joomlathing&id=' . $id;

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
	 * Get the URL route for a joomlathings category from a joomlathings category ID and language
	 *
	 * @param   mixed  $catid     The id of the joomlathings's category either an integer id or an instance of CategoryNode
	 * @param   mixed  $language  The id of the language being used.
	 *
	 * @return  string  The link to the joomlathings
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
			$link = 'index.php?option=com_joomlathings&view=category&id=' . $id;

			if ($language && $language !== '*' && Multilanguage::isEnabled())
			{
				$link .= '&lang=' . $language;
			}
		}

		return $link;
	}
}
