<?php
use Wandu\Template\Syntax\Template;

Template::setLayout('../layout/master', [
    'self' => 'posts',
    'jsFiles' => ['/static/publ/js/posts.js']
]);
?>

<div class="list main-first">
    <div class="item item-create linkable" data-href="/admin/posts/create<?php echo $query?>">
        <div class="title">Create New Post!</div>
        <div class="icon"><i class="fa fa-plus-circle fa-4x"></i></div>
    </div>
<?php foreach ($posts as $post) : ?>
    <div class="item linkable" data-href="/admin/posts/<?php echo $post['id'] ?><?php echo $query?>">
        <div class="title"><?php echo $post['title'] ?></div>
        <div class="buttons">
            <form action="/admin/posts/<?php echo $post['id'] ?>" method="POST">
                <input type="hidden" name="_method" value="delete" />
                <button type="submit" class="pure-button pure-button-alert">Delete</button>
            </form>
        </div>
    </div>
<?php endforeach; ?>
    <div class="more">
        <button class="pure-button pure-button-primary button-more" data-last="<?php echo isset($post['id']) ? $post['id'] : -1?>" data-ajax="/admin/ajax/posts">Read More</button>
    </div>
</div>

<?php echo Template::section('main') ?>
