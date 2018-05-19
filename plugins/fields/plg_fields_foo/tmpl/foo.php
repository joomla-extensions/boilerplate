<?php
/**
 * @package    [EXTENSION_NAME]
 *
 * @author     [AUTHOR] <[AUTHOR_EMAIL]>
 * @copyright  [COPYRIGHT]
 * @license    GNU General Public License version 3 or later; see LICENSE.txt
 * @link       [AUTHOR_URL]
 */

defined('_JEXEC') or die;

$fieldValue = $field->value;

if ($fieldValue === '' || $fieldValue === null)
{
	return;
}
