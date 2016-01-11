<?php
echo \Wandu\Template\Syntax\Template::load('header', ['title' => 'title from full-layout']);
echo \Wandu\Template\Syntax\Template::section('main');
echo \Wandu\Template\Syntax\Template::load('footer');
?>
