<?php
use Wandu\Template\Syntax\Template;

Template::setLayout('../layout/master', [
    'self' => 'users',
    'jsFiles' => ['/static/publ/js/users.js']
]);
?>

<div class="list main-first">
    <div class="item item-create linkable" data-href="/admin/users/create">
        <div class="title">Create New User!</div>
        <div class="icon"><i class="fa fa-plus-circle fa-4x"></i></div>
    </div>
<?php foreach ($users as $user) : ?>
    <div class="item linkable" data-href="/admin/users/<?php echo $user['username'] ?>">
        <div class="username"><?php echo $user['username'] ?></div>
        <div class="buttons">
            <form action="/admin/users/<?php echo $user['username'] ?>" method="POST">
                <input type="hidden" name="_method" value="delete" />
                <button type="submit" class="pure-button pure-button-alert">Delete</button>
            </form>
        </div>
    </div>
<?php endforeach; ?>
    <div class="more">
        <button class="pure-button pure-button-primary button-more" data-last="<?php echo isset($user['id']) ? $user['id'] : -1?>" data-ajax="/admin/ajax/users">Read More</button>
    </div>
</div>

<?php echo Template::section('main') ?>
