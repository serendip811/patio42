<?php
use Wandu\Template\Syntax\Template;

Template::setLayout('../settings/layout', [
    'self' => 'categories'
]);
?>

<div class="list main-second">
    <div class="item item-create linkable" data-href="/admin/settings/categories/create">
        <div class="title">Create New Category!</div>
        <div class="icon"><i class="fa fa-plus-circle fa-4x"></i></div>
    </div>
<?php foreach ($categories as $category) : ?>
    <div class="item linkable" data-href="/admin/settings/categories/<?php echo $category['id'] ?>">
        <div class="name"><?php echo $category['name'] ?></div>
        <div class="buttons">
            <form action="/admin/settings/categories/<?php echo $category['id'] ?>" method="POST">
                <input type="hidden" name="_method" value="delete" />
                <button type="submit" class="pure-button pure-button-alert">Delete</button>
            </form>
        </div>
    </div>
<?php endforeach; ?>
</div>
