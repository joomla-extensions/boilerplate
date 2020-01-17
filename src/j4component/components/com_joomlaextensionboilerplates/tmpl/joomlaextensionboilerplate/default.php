<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_joomlaextensionboilerplates
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

if ($this->item->params->get('show_name')) {
	if ($this->Params->get('show_joomlaextensionboilerplate_name_label')) {
		echo Text::_('COM_JOOMLAEXTENSIONBOILERPLATES_NAME') . $this->item->name;
	} else {
		echo $this->item->name;
	}
}

echo $this->item->event->afterDisplayTitle;
echo $this->item->event->beforeDisplayContent;
echo $this->item->event->afterDisplayContent;
