<?php
/**
 * @package    [PACKAGE_NAME]
 *
 * @author     [AUTHOR] <[AUTHOR_EMAIL]>
 * @copyright  [COPYRIGHT]
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       [AUTHOR_URL]
 */

use Joomla\CMS\Table\Table;

defined('_JEXEC') or die;

/**
 * Joomlaextensionboilerplate table.
 *
 * @package   [PACKAGE_NAME]
 * @since     1.0.0
 */
class TableJoomlaextensionboilerplate extends Table
{
	/**
	 * Constructor
	 *
	 * @param   JDatabaseDriver  $db  Database driver object.
	 *
	 * @since   1.0.0
	 */
	public function __construct(JDatabaseDriver $db)
	{
		parent::__construct('#__joomlaextensionboilerplate_items', 'item_id', $db);
	}
}
