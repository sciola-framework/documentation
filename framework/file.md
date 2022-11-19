<p>

### <a href="#-routes"><img src="https://github.com/sciola-git/sciola-git.github.io/blob/main/images/icons/folder.svg?raw=true" width="60px" align="center" /></a> routes

</p>

In this directory are your application's route files.

Route is the path (URL) and are responsible for calling the controllers.

##

Example:

```php
<?php

use Sciola\Route;

Route::add('/my/route', function () {
    controller('MyController')->myMethod();
});
```

```http://localhost/my/route```

```php
<?php

use Sciola\Route;

Route::add('/this-route-is-defined', function () {
    echo 'You need to patch this route to see this content';
}, 'patch');

Route::add('/form', function () {
    print_r($_GET);
}, 'get');

Route::add('/form', function () {
    print_r($_POST);
}, 'post');

Route::add('/form', function () {
    print_r($_REQUEST); // $_GET and $_POST
});

Route::add('/foo/(.*)', function ($var1) { // Required argument
    echo $var1;
});

Route::add('/foo/?(.*)', function ($var1) { // Optional argument
    echo $var1;
});

Route::add('/foo/([0-9]*)/bar', function ($var1) {
    echo $var1;
});

Route::add('/user/(.*)/edit', function ($id) {
    echo $id;
});

Route::add('/(.*)/(.*)/(.*)/(.*)', function ($var1,$var2,$var3,$var4) {
    echo 'This is the first match: ', $var1.' / '.$var2.' / '.$var3.' / '.$var4;
});
```

> **Note** *You can create multiple route files as per your application's organizational structure.*

File: **my_routes.php**

```php
<?php

use Sciola\Route;

Route::add('/', function () {
    controller('MyController')->myMethod();
});

Route::add('/my-route', function () {
    controller('MyController')->myMethod('args');
});

Route::add('/' . translate('my-route'), function () {
    controller('MyController')->myMethod('args');
});
```

### :lock: Authenticated Route

```php
<?php

use Sciola\Route;

Route::add('/foo', function () {
    // ADMIN - Allow only the ADMIN group to access this route
    Auth::group('ADMIN', function ($data) {
        controller('MyController')->myMethod($data);
    });
});

Route::add('/foo', function () {
    // Groups that can access this route
    Auth::group('AUTHOR, COLLABORATOR, CREATOR, EDITOR', function ($data) {
        controller('MyController')->myMethod($data);
    });
});

Route::add('/foo', function () {
    // ALL - Allow any group to access this route
    Auth::group('ALL', function ($data) {
        controller('MyController')->myMethod($data);
    });
});

Route::add('/foo/(.*)', function ($arg) {
    // ALL - Allow any group to access this route
    Auth::group('ALL', function ($data) use ($arg) {
        controller('MyController')->myMethod($data, $arg);
    });
});
```

https://github.com/delight-im/PHP-Auth/blob/master/README.md#roles-or-groups

```php
<?php

\Delight\Auth\Role::ADMIN;
\Delight\Auth\Role::AUTHOR;
\Delight\Auth\Role::COLLABORATOR;
\Delight\Auth\Role::CONSULTANT;
\Delight\Auth\Role::CONSUMER;
\Delight\Auth\Role::CONTRIBUTOR;
\Delight\Auth\Role::COORDINATOR;
\Delight\Auth\Role::CREATOR;
\Delight\Auth\Role::DEVELOPER;
\Delight\Auth\Role::DIRECTOR;
\Delight\Auth\Role::EDITOR;
\Delight\Auth\Role::EMPLOYEE;
\Delight\Auth\Role::MAINTAINER;
\Delight\Auth\Role::MANAGER;
\Delight\Auth\Role::MODERATOR;
\Delight\Auth\Role::PUBLISHER;
\Delight\Auth\Role::REVIEWER;
\Delight\Auth\Role::SUBSCRIBER;
\Delight\Auth\Role::SUPER_ADMIN;
\Delight\Auth\Role::SUPER_EDITOR;
\Delight\Auth\Role::SUPER_MODERATOR;
\Delight\Auth\Role::TRANSLATOR;

/*
  Database field: roles_mask
  Default value: 0
  List of values:
*/

Array
(
  [1]       => ADMIN
  [2]       => AUTHOR
  [4]       => COLLABORATOR
  [8]       => CONSULTANT
  [16]      => CONSUMER
  [32]      => CONTRIBUTOR
  [64]      => COORDINATOR
  [128]     => CREATOR
  [256]     => DEVELOPER
  [512]     => DIRECTOR
  [1024]    => EDITOR
  [2048]    => EMPLOYEE
  [4096]    => MAINTAINER
  [8192]    => MANAGER
  [16384]   => MODERATOR
  [32768]   => PUBLISHER
  [65536]   => REVIEWER
  [131072]  => SUBSCRIBER
  [262144]  => SUPER_ADMIN
  [524288]  => SUPER_EDITOR
  [1048576] => SUPER_MODERATOR
  [2097152] => TRANSLATOR
)
```
