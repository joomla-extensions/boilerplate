<?php
/**
 * @package    [EXTENSION_NAME]
 *
 * @author     [AUTHOR] <[AUTHOR_EMAIL]>
 * @copyright  [COPYRIGHT]
 * @license    [LICENSE]
 * @link       [AUTHOR_URL]
 */

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Layout\FileLayout;

defined('_JEXEC') or die;

HTMLHelper::_('script', 'com_foo/script.js', array('version' => 'auto', 'relative' => true));
HTMLHelper::_('stylesheet', 'com_foo/style.css', array('version' => 'auto', 'relative' => true));

$layout = new FileLayout('foo.page');
$data = new stdClass;
$data->text = 'Hello Joomla!';
echo $layout->render($data);
