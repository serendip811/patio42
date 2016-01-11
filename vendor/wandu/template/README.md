Wandu Template
===

[![Latest Stable Version](https://poser.pugx.org/wandu/template/v/stable.svg)](https://packagist.org/packages/wandu/template)
[![Latest Unstable Version](https://poser.pugx.org/wandu/template/v/unstable.svg)](https://packagist.org/packages/wandu/template)
[![Total Downloads](https://poser.pugx.org/wandu/template/downloads.svg)](https://packagist.org/packages/wandu/template)
[![License](https://poser.pugx.org/wandu/template/license.svg)](https://packagist.org/packages/wandu/template)

[![Build Status](https://img.shields.io/travis/Wandu/Template/master.svg)](https://travis-ci.org/Wandu/Template)
[![Code Coverage](https://scrutinizer-ci.com/g/Wandu/Template/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Wandu/Template/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Wandu/Template/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Wandu/Template/?branch=master)

Native PHP Template Engine.

inspired by [Plate](http://platesphp.com)

## Installation

### via Composer

`composer require wandu/template`

## How to use

### Simple Example
```php
<?php
namespace Your\Own\Space;

use Wandu\Template\Manager;

$template = new Manager(__DIR__ .'/views');
$template->render('profile', ['name' => 'Changwan Jun']);
```

and `views/profile.php` file.

```php
Hello, <?php echo $name?>!
```

result

```
Hello, Changwan Jun!
```

## View Syntax

### Load

> `Template::load($templateName, $bindValues);`

It is useful to include other template files. This will be return the contents that named `$templateName` as a string.

#### Example.

`main.php`

```php
<?php
use Wandu\Template\Syntax\Template;
?>
<?php echo Template::load('header', ['title' => 'this is title']); ?>
Hello, <?php echo $name?>!
<?php echo Template::load('footer', ['text' => 'this is footer']); ?>
```

`header.php`

```php
<header><?php echo $title?></header>
<main>
```

`footer.php`

```php
</main>
<footer><?php echo $text?></footer>
```

Result of `$template->render('main', ['name' => 'Changwan Jun']);`.

```html
<header>this is title</header>
<main>Hello, Changwan Jun!</main>
<footer>this is footer</footer>
```

### Layout

> `Template::setLayout($templateName, $bindValues);`

> `Template::section('main');`

#### Example.

`main.php`

```php
<?php
use Wandu\Template\Syntax\Template;

Template::setLayout('my-layout', ['title' => 'this is title!']);
?>
this is main contents!
```

`my-layout.php`

```php
<?php
use Wandu\Template\Syntax\Template;
?>
<header><?php echo $title?></header>
<main><?php echo Template::section('main');?></main>
```

Result of `$template->render('main');`.

```html
<header>this is title!</header>
<main>this is main contents!</main>
```

### Section

> `Template::setSection($sectionName, $contents);`

> `Template::section($sectionName);`

You would have seen the code `Template::section('main');` in the [Layout](#layout). In the layout, it is automatically
assigned to the content of the text in the section named `main`. If you want to assign content to other sections, You
can use the following:

> `Template::setSection($sectionName, Template::load($templateFile, $bindValues));`

#### Example.

`main.php`

```php
<?php
use Wandu\Template\Syntax\Template;

Template::setLayout('my-layout');
Template::setSection('aside', Template::load('aside', ['title' => 'This is Aside']));
?>
This is main.php
```

`aside.php`

```php
<h2><?php echo $title?></h2>
<ul>
    <li>Hello</li>
    <li>Hello</li>
</ul>
```

`my-layout.php`

```php
<?php
use Wandu\Template\Syntax\Template;
?>
<aside><?php echo Template::section('aside');?></aside>
<main><?php echo Template::section('main');?></main>
```

Result of `$template->render('main');`.

```html
<aside>
<h2>This is Aside</h2>
<ul>
   <li>Hello</li>
   <li>Hello</li>
</ul>
</aside>
<main>This is main.php</main>
```
