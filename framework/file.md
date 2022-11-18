### :arrow_right: Twig

Twig Documentation - https://twig.symfony.com/doc/3.x/

Develop, run, store and access Twig code online - https://twigfiddle.com







<p>

### <a href="#-packages"><img src="https://github.com/sciola-git/sciola-git.github.io/blob/main/images/icons/folder.svg?raw=true" width="60px" align="center" /></a> packages

</p>

In this directory are the packages managed by [composer](https://getcomposer.org) and [npm](https://www.npmjs.com).

##

> **Note** *You can configure public packages, with access via url.*

File: **package.json**

```json
{
  "dependencies": {

  },
  "public": {
    "my-package-1": "my-package-1/dist",
    "my-package-2": "my-package-2/dist"
  }
}
```

```
Access URL:

http://localhost/packages/my-package-1/css/all.min.css
http://localhost/packages/my-package-1/js/all.min.js

http://localhost/packages/my-package-2/css/all.min.css
http://localhost/packages/my-package-2/js/all.min.js
```

##

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



<br>

## Front-end

<br>

```html
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/packages/sciola/css/all.min.css">
    <script src="/packages/sciola/js/all.min.js"></script>
    <script type="text/javascript">
    const sciola = new Sciola();
    sciola.init();
    </script>
  </head>
  <body>
  </body>
</html>
```

<br>

> ### JS
> ---
>
> **Classes**
> ```js
> $_["document"]
> 
> $_["http"]
> 
> $_["file"]
> 
> $_["language"]
> 
> $_["element"]
> 
> $_["event"]
> 
> $_["time"]
> 
> $_["component"]
> ```
> **Methods**
> ```js
> ------------------------------------------------------------------------------
> $_["document"]
> ------------------------------------------------------------------------------
>
> // $_["document"] has the object (document) with the most features
> $_["document"] === document
> 
> // Get document language
> $_["document"].lang;
> 
> // DOM content loaded
> $_["document"].ready(function (e) {
> 
> });
> 
> // Add event listener
> $_["document"].on("event", function () {
> 
> });
> 
> // Overwrite current document with HTML data
> $_["document"].html("data");
> 
> // Get document height
> $_["document"].height();
> 
> // Get document width
> $_["document"].width();
> 
> // Error information
> $_["document"].error(function (info) {
>     /*
>       info.message
>       info.file
>       info.line
>       info.col
>       info.error
>     */
>     console.log(info);
> });
>
> ------------------------------------------------------------------------------
> $_["http"]
> ------------------------------------------------------------------------------
>
> // const url = "/my/route/here" or "http://domain.ext/query/..."
> $_["http"].get(url, (error, response) => {
>     if (!error) {
>         return console.log(response);
>     }
>     console.log(error);
> });
> 
> $_["http"].get(url)
> .then(response => console.log(response))
> .catch(error => console.log(error));
>
> // HTTP request - GET | POST
>
> // GET
> $_["http"].request("/app-route", (error, response) => {
>     if (!error) {
>         console.log(response.data);
>     } else {
>         console.log(response);
>     }
> });
>
> // POST
> $_["http"].request("/app-route", {"Form":"data"}, (error, response) => {
>     if (!error) {
>         console.log(response.data);
>     } else {
>         console.log(response);
>     }
> });
>
> ------------------------------------------------------------------------------
> $_["file"]
> ------------------------------------------------------------------------------
>
> // Include .js file
> $_["file"].include("path/file.js");
> 
> // Include multiple .js files
> $_["file"].include(["path/file1.js", "path/file2.js", "path/file3.js"]);
>
> ------------------------------------------------------------------------------
> $_["language"]
> ------------------------------------------------------------------------------
>
> // Translate a term
> $_["language"].translate("Text...");
>
> ------------------------------------------------------------------------------
> $_["element"]
> ------------------------------------------------------------------------------
>
> // Get the element reference through its ID
> $_["element"].id("myid");
>
> ------------------------------------------------------------------------------
> $_["event"]
> ------------------------------------------------------------------------------
>
> //Attach an event handler function to the selected elements.
> $_["event"].on("event", "#id", function (e) {
>
> });
>
> ------------------------------------------------------------------------------
> $_["time"]
> ------------------------------------------------------------------------------
>
> // Pause script execution
> $_["time"].sleep(5); // 5 seconds
>
> ------------------------------------------------------------------------------
> $_["component"]
> ------------------------------------------------------------------------------
>
> // Navigation Bar Scrolling (navbar -> dark to light)
> $_["component"].navbar().effect("dark-to-light");
> 
> /*
>   $_["component"].box("Text...", "Background color", "Close button", "CSS classes", "ID");
>   Background color: primary | secondary | success | danger | warning | info | light | dark
>   Close button: true | false
>   ID: ID of the element where the message box will be displayed. <span id="myid"></span>
> */
> $_["component"].box("Text...", "primary");
> $_["component"].box("Text...", "primary", true);
> $_["component"].box("Text...", "primary", true, "m-2 p-2 shadow");
> $_["component"].box("Text...", "primary", true, "m-2 p-2 shadow", "#myid");
>
> $_["component"].dialog.alert("Text...");
> 
> $_["component"].dialog.alert("Text...", event => {
>
> });
> 
> $_["component"].dialog.confirm("Text...", event => {
>
> });
>
> /*
>   $_["component"].icon("Icon", "Size");
>
>   Size: xs | sm | lg | 2x | 3x | 4x | 5x | 6x | 7x | 8x | 9x | 10x
>
>   Icon:
>   - success
>   - info
>   - warning
>   - danger
>   - close
>   - plus
>   - edit
>   - trash
>   - check
>   - search
>   - square
>   - check-square
> */
>
> $_["component"].icon("success", "lg");
> ```

<br>

## Twig

<br>

> ### Filters
> ---
>
> ```twig
> ------------------------------------------------------------------------------
> Date format - Required extension: php-intl
> ------------------------------------------------------------------------------
> {{ '2022-11-02' | datef }}
>
> Output [en]:
> November 2, 2022
>
> Output [pt-BR]:
> 2 de novembro de 2022
>
> ------------------------------------------------------------------------------
> Remove accent
> ------------------------------------------------------------------------------
> {{ 'ÁÉÍóú são àçô' | remove_accent }} // AEIou sao aco
>
> ------------------------------------------------------------------------------
> Format route
> ------------------------------------------------------------------------------
> {{ 'ÁÉÍóú são àçô' | route }} // aeiou-sao-aco
>```
>
> ### Functions
> ---
> 
> ```twig
> ------------------------------------------------------------------------------
> Get base route
> ------------------------------------------------------------------------------
> {{ base_route('/my/route') }}
>
> ------------------------------------------------------------------------------
> Message box
> ------------------------------------------------------------------------------
> {{ box('Text...', 'Background color', 'Close button', 'CSS classes') }}
>
> Background color:
> primary | secondary | success | danger | warning | info | light | dark
>
> Close button: true | false
>
> {{ box('Text...', 'primary') }}
> {{ box('Text...', 'primary', true) }}
> {{ box('Text...', 'primary', true, 'm-2 p-2 shadow') }}
>
> ------------------------------------------------------------------------------
> Language list
> ------------------------------------------------------------------------------
> {{ language_list() }}
>
> ------------------------------------------------------------------------------
> .md file interpreter
> ------------------------------------------------------------------------------
> {{ parsedown('/path/to/file.md')|raw }}
>
> ------------------------------------------------------------------------------
> Get session
> ------------------------------------------------------------------------------
> {{ session('name') }}
>
> ------------------------------------------------------------------------------
> Text translation
> ------------------------------------------------------------------------------
> {{ translate('Text...') }}
> ```
> 
> ### Layout
> ---
> 
> ```twig
> ------------------------------------------------------------------------------
> Include header
> ------------------------------------------------------------------------------
>
> Example 1 ====================================================================
> 
> {% include header %}
>
> Example 2 ====================================================================
> 
> {% include header with {
>     meta: {
>       title: '',
>       description: '',
>       keywords: ''
>     }
>   }
> %}
>
> Example 3 ====================================================================
> 
> {% include header with {
>     meta: {
>       title: '',
>       description: '',
>       keywords: ''
>     },
>     css: ['/packages/pack-1/style.min.css',
>           '/packages/pack-2/style.min.css',
>           '/packages/pack-3/style.min.css']
>   }
> %}
>
> Example 4 ====================================================================
> 
> {% include header with {
>     meta: {
>       title: '',
>       description: '',
>       keywords: ''
>     },
>     css: ['/packages/pack-1/style.min.css',
>           '/packages/pack-2/style.min.css',
>           '/packages/pack-3/style.min.css'],
>     js:  ['/packages/pack-1/script.min.js',
>           '/packages/pack-2/script.min.js',
>           '/packages/pack-3/script.min.js']
>   }
> %}
>
> Example 5 ====================================================================
> 
> {% include header with {
>     meta: {
>       title: translate('My title')
>     }
> %}
> ```
>
> ```twig
> ------------------------------------------------------------------------------
> Include navbar
> ------------------------------------------------------------------------------
>
> Example 1 ====================================================================
> 
> <html>
>   <head>
>   </head>
>   <body>
>     <header>
>       {{ include('Layout/navbar.html') }}
>     </header>
>     <main>
>     </main>
>   </body>
> </html>
>
> Example 2 ====================================================================
> 
> <html>
>   <head>
>   </head>
>   <body>
>     <header>
>       {{ auth.login ? include('Layout/restricted_navbar.html') : include('Layout/navbar.html') }}
>     </header>
>     <main>
>     </main>
>   </body>
> </html>
> ```
> 
> ```twig
> ------------------------------------------------------------------------------
> Include footer
> ------------------------------------------------------------------------------
>
> Example 1 ====================================================================
> 
> {% include footer %}
>
> Example 2 ====================================================================
> 
> {% include footer with {
>     js: ['/packages/pack-1/script.min.js',
>          '/packages/pack-2/script.min.js',
>          '/packages/pack-3/script.min.js']
>   }
> %}
>
> Example 3 ====================================================================
> 
> {% include footer with {
>     css: ['/packages/pack-1/style.min.css',
>           '/packages/pack-2/style.min.css',
>           '/packages/pack-3/style.min.css'],
>     js:  ['/packages/pack-1/script.min.js',
>           '/packages/pack-2/script.min.js',
>           '/packages/pack-3/script.min.js']
>   }
> %}
> ```

<br>

## License

The Sciola framework is open-sourced software licensed under the [MIT license](LICENSE.md).

Author: [Leandro Sciola](https://sciola-framework.github.io/leandro-sciola)
