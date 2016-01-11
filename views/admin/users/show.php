<?php
use Wandu\Template\Syntax\Template;

Template::setLayout('layout');
?>

<div class="contents main-second">
    <div class="header">
        <h2>Modify User</h2>
    </div>
    <form method="post" action="/admin/users/<?php echo $user['username']?>" class="pure-form pure-form-aligned">
        <input type="hidden" name="_method" value="put" />
        <div class="body">
            <fieldset>
                <div class="pure-control-group">
                    <label for="FormUsername">Username</label>
                    <input id="FormUsername" type="text" name="username" placeholder="Username" value="<?php echo $user['username']?>" autofocus />
                </div>

                <div class="pure-control-group">
                    <label for="FormPassword">Password</label>
                    <input id="FormPassword" type="password" name="password" placeholder="Password" />
                </div>

                <div class="pure-control-group">
                    <label for="FormPassword2"></label>
                    <input id="FormPassword2" type="password" name="password2" placeholder="Password One More" />
                </div>

                <div class="pure-control-group">
                    <label for="FormEmail">Email Address</label>
                    <input id="FormEmail" type="email" name="email" placeholder="Email Address" required value="<?php echo $user['email']?>" />
                </div>

                <div class="pure-control-group">
                    <label for="FormLevel">Level</label>
                    <select id="FormLevel" name="level" data-value="<?php echo $user['level']?>">
                        <option value="100">Guest</option>
                        <option value="1">Manager</option>
                        <option value="0">Administrator</option>
                    </select>
                </div>
            </fieldset>
        </div>
        <div class="footer">
            <button type="submit" class="pure-button pure-button-primary width-half">Modify</button>
        </div>
    </form>
</div>
