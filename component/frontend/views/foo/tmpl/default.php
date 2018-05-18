<?php
/**
 * @package    Foo Name
 *
 * @author     Extly, CB. <team@extly.com>
 * @copyright  Copyright (c)2007-2018 Extly, CB. All rights reserved.
 * @license    GNU General Public License version 3 or later; see LICENSE.txt
 * @link       https://www.extly.com
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
