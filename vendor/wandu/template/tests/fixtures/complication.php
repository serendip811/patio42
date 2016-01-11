<?php
use Wandu\Template\Syntax\Template;

Template::setLayout('skin/sub-layout');
Template::setSection('aside', Template::load('skin/aside', []));
?>
This is complicated website example.
Hello, I'm <?php echo $name?>.
