<?php
/**
 * @package    Foo Name
 *
 * @author     Extly, CB. <team@extly.com>
 * @copyright  Copyright (c)2007-2018 Extly, CB. All rights reserved.
 * @license    GNU General Public License version 3 or later; see LICENSE.txt
 * @link       https://www.extly.com
 */

use Joomla\CMS\Table\Table;

defined('_JEXEC') or die;

/**
 * Foo table.
 *
 * @since       1.0
 */
class TableFoo extends Table
{
	/**
	 * Constructor
	 *
	 * @param   JDatabaseDriver  $db  Database driver object.
	 *
	 * @since   1.0
	 */
	public function __construct(JDatabaseDriver $db)
	{
		parent::__construct('#__foo_items', 'item_id', $db);
	}
}
