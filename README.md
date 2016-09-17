# Facebook Service Provider
A Graph API wrapper for Laravel 5.3

## Installation
Use composer to pull the package with

```Bash
composer require iconic/facebook:dev-master
```

This will also pull the current version of Facebook's graph PHP SDK.

## Laravel Configuration
As always, we need to register the provider and our Facade into 
the configuration files, update composer, and vendor-publish the configuration files and views.

So we add this in the relevant areas

**Provider**

```PHP
Iconic\Facebook\FacebookServiceProvider::class, 
```

**Facade Alias**

```PHP
'Facebook' => Iconic\Facebook\Facades\FacebookClient::class, 
```


**DO NOT** forget to update composer's autoload with

```Bash
 composer dump-autoload -o 
 ```

**Publish Views and Configuration Files**

```Bash
php artisan vendor:publish 
```

**Configuration file**

The file facebook.php is copied inside the config folder. 
Edit it with your own app ID and secret from your Facebook Application.
 In this file you can also change the routes, required permissions, the views used to display the login link etc.

 ## Verify that everything works ok
 
 Navigate to /facebook-login and you should see a link to Log into FB.
 
 As soon as you do that, the provider hits the /me endpoint and retrieves your name, just to 
 check that everything is ok. 
 
 If you keep seeing the login link, this means that your session settings are off. And check that the framework can write in cache and session folders.
 
 ## Usage
 
 Just reference the Facade and start sending queries.
 
 ```PHP
 Facebook::get('/me');
 ```
 
 # Licenced under MIT
 
 Copyright (c) 2016 Kastaniotis Dimitris (dimkasta)
 
 Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 
 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 
 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
