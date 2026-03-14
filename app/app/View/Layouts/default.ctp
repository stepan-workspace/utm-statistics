<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->Html->css('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
    <div id="container">
        <div id="header" class="bg-primary py-3">
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
					<a class="navbar-brand" href="/">UTM Statistics</a>
					<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						<li class="nav-item">
							<?php echo $this->Html->link('Home', '/', ['class' => 'nav-link']); ?>
						</li>
						<li class="nav-item">
							<?php echo $this->Html->link('Statistics', '/statistics/utm/list', ['class' => 'nav-link']); ?>
						</li>
					</ul>
				</div>
			</nav>
        </div>

        <div id="content" class="container mt-4">
            <?php echo $this->Flash->render(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>

        <div id="footer" class="bg-light text-center py-3">
            <p>&copy; 2026 <?php echo $cakeVersion; ?></p>
        </div>
    </div>

    <?php
        echo $this->Html->script('https://code.jquery.com/jquery-3.5.1.slim.min.js');
        echo $this->Html->script('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js');
    ?>
</body>
</html>
