<?php
use Wandu\Template\Syntax\Template;

Template::setLayout('../layout/master', [
    'self' => 'settings'
]);
$self = isset($self) ? $self : null;
?>

<div class="list main-first">
    <div class="item linkable<?php echo $self === 'categories'? ' active' : ''?>" data-href="/admin/settings/categories">
        <div class="title">Post Category</div>
    </div>
</div>

<?php echo Template::section('main') ?>
