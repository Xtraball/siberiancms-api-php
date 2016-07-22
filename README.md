# Siberian API Php Library

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