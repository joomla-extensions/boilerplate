<?php
/**
 * @package    [PACKAGE_NAME]
 *
 * @author     [AUTHOR] <[AUTHOR_EMAIL]>
 * @copyright  [COPYRIGHT]
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       [AUTHOR_URL]
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Layout\FileLayout;

/** @var JoomlaextensionboilerplateViewJoomlaextensionboilerplate $this */

HTMLHelper::_('script', 'com_joomlaextensionboilerplate/script.js', ['version' => 'auto', 'relative' => true]);
HTMLHelper::_('stylesheet', 'com_joomlaextensionboilerplate/style.css', ['version' => 'auto', 'relative' => true]);

$layout       = new FileLayout('joomlaextensionboilerplate.page');
$data         = [];
$data['text'] = 'Hello Joomla!';
echo $layout->render($data);
