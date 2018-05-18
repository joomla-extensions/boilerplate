<?php
/**
 * @package    Foo Name
 *
 * @author     Extly, CB. <team@extly.com>
 * @copyright  Copyright (c)2007-2018 Extly, CB. All rights reserved.
 * @license    GNU General Public License version 3 or later; see LICENSE.txt
 * @link       https://www.extly.com
 */

defined('_JEXEC') or die;

// Access to module parameters
$domain = $params->get('domain', 'https://www.joomla.org');
?>

<a href="<?php echo $domain; ?>">
	<?php echo 'Hello!'; ?>
</a>
