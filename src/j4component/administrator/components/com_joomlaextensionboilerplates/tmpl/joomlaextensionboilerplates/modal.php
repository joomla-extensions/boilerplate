<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_joomlaextensionboilerplates
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Session\Session;

$app = Factory::getApplication();

HTMLHelper::_('script', 'com_joomlaextensionboilerplates/admin-joomlaextensionboilerplates-modal.min.js', array('version' => 'auto', 'relative' => true));

$function  = $app->input->getCmd('function', 'jSelectJoomlaextensionboilerplates');
$onclick   = $this->escape($function);
?>
<div class="container-popup">

	<form action="<?php echo Route::_('index.php?option=com_joomlaextensionboilerplates&view=joomlaextensionboilerplates&layout=modal&tmpl=component&function=' . $function . '&' . Session::getFormToken() . '=1'); ?>" method="post" name="adminForm" id="adminForm" class="form-inline">

		<?php if (empty($this->items)) : ?>
			<div class="alert alert-warning">
				<?php echo Text::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
			</div>
		<?php else : ?>
			<table class="table table-sm">
				<thead>
					<caption id="captionTable" class="sr-only">
						<?php echo Text::_('COM_JOOMLAEXTENSIONBOILERPLATES_TABLE_CAPTION'); ?>, <?php echo Text::_('JGLOBAL_SORTED_BY'); ?>
					</caption>
					<tr>
						<th scope="col" style="width:10%" class="d-none d-md-table-cell">
						</th>
						<th scope="col" style="width:1%">
						</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$iconStates = [
					-2 => 'icon-trash',
					0  => 'icon-unpublish',
					1  => 'icon-publish',
					2  => 'icon-archive',
				];
				?>
				<?php foreach ($this->items as $i => $item) : ?>
					<?php $lang = ''; ?>
					<tr class="row<?php echo $i % 2; ?>">
						<th scope="row">
							<a class="select-link" href="javascript:void(0)" data-function="<?php echo $this->escape($onclick); ?>" data-id="<?php echo $item->id; ?>" data-title="<?php echo $this->escape($item->name); ?>">
								<?php echo $this->escape($item->name); ?>
							</a>
						</th>
						<td>
							<?php echo (int) $item->id; ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

		<?php endif; ?>

		<input type="hidden" name="task" value="">
		<input type="hidden" name="forcedLanguage" value="<?php echo $app->input->get('forcedLanguage', ''); ?>">
		<?php echo HTMLHelper::_('form.token'); ?>

	</form>
</div>
