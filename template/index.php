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

use \Joomla\CMS\Factory;

$app             = Factory::getApplication();
$doc             = Factory::getDocument();
$user            = Factory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Output as HTML5
$doc->setHtml5(true);

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

$doc->addScriptVersion($this->baseurl . '/templates/' . $this->template . '/js/template.js', array('version' => 'auto'));

// Add Stylesheets
$doc->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/template.css', array('version' => 'auto'));

// Check for a custom CSS file
$userCss = JPATH_SITE . '/templates/' . $this->template . '/css/user.css';

if (file_exists($userCss) && filesize($userCss) > 0)
{
	$this->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/user.css', array('version' => 'auto'));
}
?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
</head>
<body>
<!-- Body -->
<div class="body">
	<a href="<?php echo $this->baseurl; ?>/">
		<?php if ($this->params->get('sitedescription')) : ?>
			<?php echo '<div class="site-description">' . htmlspecialchars($this->params->get('sitedescription'), ENT_COMPAT, 'UTF-8') . '</div>'; ?>
		<?php endif; ?>
	</a>
	<jdoc:include type="modules" name="position-0" style="none" />

	<jdoc:include type="message" />
	<jdoc:include type="component" />

	<?php if ($this->countModules('position-1')) : ?>
		<jdoc:include type="modules" name="position-1" style="none" />
	<?php endif; ?>
</div>
<!-- Footer -->
<footer>
	<jdoc:include type="modules" name="footer" style="none" />
	<p>
		&copy; <?php echo date('Y'); ?> <?php echo $sitename; ?>
	</p>
</footer>
<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
