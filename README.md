# Easiest MVC Framework for PHP

## Demo

Controller: IndexController.php
```php
<?php

require "./vendor/autoload.php";

class IndexController extends \CiyaZ\TachyonMvc\Controller
{
    public function get($mv)
    {
        $mv->view = "./index.php";
        $mv->model = array("username" => "root", "password" => "123456");
        
        return $mv;
    }

}

\CiyaZ\TachyonMvc\register_controller(new IndexController());
```

View: index.php
```php
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>User Info</title>
</head>
<body>

<table>
    <caption>User Info</caption>
    <tr>
        <td>username</td>
        <td><?php echo $m["username"] ?></td>
    </tr>
    <tr>
        <td>password</td>
        <td><?php echo $m["password"] ?></td>
    </tr>
</table>

</body>
</html>
```

## Download

```
composer require ciyaz/tachyon-mvc
```