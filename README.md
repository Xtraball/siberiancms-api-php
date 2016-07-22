# Siberian API Php Library

You can refer to the developers documentation for available methods and parameters

[API Documentation](http://developer.siberiancms.com/api/)

## Basic usage

Init the API with 

```php
\Siberian\Api::init($domain, $username, $password);
```

Create a new user

```
$response = \Siberian\User::create($email, $password, $firstname, $lastname, $role_id);
if($response->isSuccess()) {
    $user_id = $create->getResponse("user_id");
    $token  = $create->getResponse("token");
} else {
    echo $response->getErrorMessage();
}
```

Create an application

```
$response = \Siberian\Application::create($name, $user_id);
if($response->isSuccess()) {
    $app_id = $create->getResponse("app_id");
    $app_url  = $create->getResponse("app_url");
} else {
    echo $response->getErrorMessage();
}
```