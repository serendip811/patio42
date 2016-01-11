<?php
use Wandu\Template\Syntax\Template;

Template::setLayout('../settings/layout', [
    'self' => 'categories'
]);
?>

<div class="contents main-second">
    <div class="header">
        <h2>Create New Post Category</h2>
    </div>
    <form method="post" action="/admin/settings/categories/<?php echo $category['id']?>" class="pure-form pure-form-aligned">
        <input type="hidden" name="_method" value="put" />
        <div class="body">
            <fieldset>
                <div class="pure-control-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" placeholder="Name" value="<?php echo $category['name']?>" autofocus />
                </div>
            </fieldset>
        </div>
        <div class="footer">
            <button type="submit" class="pure-button pure-button-primary">Submit</button>
        </div>
    </form>
</div>
