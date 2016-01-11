<?php echo \Wandu\Template\Syntax\Template::load('header', ['title' => 'this is title']); ?>
this is <?php echo $who?>!
<?php echo \Wandu\Template\Syntax\Template::load('footer', ['title' => 'this is footer']); ?>
