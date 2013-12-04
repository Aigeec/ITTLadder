<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
    $title='Inchicore Table Tennis Club Ladder';
    if(!isset($cols)){ $cols = 6; }
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
    <?php echo $this->Html->meta('description','See the latest movers and shakers in the Inchicore Table Tennis Club ladder'); ?>
    <?php echo $this->Html->meta('author','Aodhagán Collins'); ?>
    <?php echo $this->Html->meta('viewport','width=device-width, initial-scale=1.0'); ?>
	<title>
		<?php echo $title; ?>:<?php echo $title_for_layout; ?>
	</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('bootstrap-theme.min');
        echo $this->Html->css('ittladder');

		//echo $this->fetch('meta');
		//echo $this->fetch('css');
		//echo $this->fetch('script');        
	?>    
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Inchicore Table Tennis Club</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="<?php echo $this->request->here == Router::url(array('controller' => 'players', 'action' => 'index', 'admin' => false)) ? 'active' : ''; ?>">
                        <?php echo $this->Html->link('Ladder',array('controller' => 'players', 'action' => 'index', 'admin' => false));?>
                    </li>
					<li class="<?php echo $this->request->here == Router::url(array('controller' => 'rules', 'action' => 'index', 'admin' => false)) ? 'active' : ''; ?>">
                        <?php echo $this->Html->link('Rules',array('controller' => 'rules', 'action' => 'index', 'admin' => false));?>
                    </li>
					<li><a href="https://www.facebook.com/inchicoreTTC">Us on Facebook</a></li>
                    <li class="pull-right <?php echo $this->params['prefix'] == 'admin' || $this->request->here == Router::url(array('controller' => 'admin', 'action' => 'index', 'admin' => false)) ? 'active' : ''; ?>">
                        <?php echo $this->Html->link('Admin',array('controller' => 'admin', 'action' => 'index', 'admin' => false));?>
                    </li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>    
	<div id="container-fluid">
        <div class="text-center" id="header">
		    <h1><?php echo $title; ?></h1>
		</div>
        <div class="row-fluid">		    
            <div class="col-xs-0 col-md-<?php echo ((12-$cols)/2); ?>">
				<!--left-->
			</div>            
            <div id="content" class="col-xs-12 col-md-<?php echo $cols; ?>">
			    <?php echo $this->Session->flash(); ?>
			    <?php echo $this->fetch('content'); ?>
		    </div>
            <div class="col-xs-0 col-md-<?php echo ((12-$cols)/2); ?>">
				<!--right-->
			</div>
        </div>
		<div id="footer">			
		</div>     
	</div>    
</body>
</html>
