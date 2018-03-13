# Siberian API Php Library

You can refer to the developers documentation for available methods and parameters

[API Documentation](http://developer.siberiancms.com/api/)

## Basic usage

#### Init the API with Basic Auth or Bearer token

```php

// Init with Basic Auth username/password
\Siberian\Api::init($domain, $username, $password);

// OR

// Init with Bearer token
\Siberian\Api::initWithBearer($domain, $bearerToken);
```

#### Create a new user

```
$response = \Siberian\User::create($email, $password, $firstname, $lastname, $role_id);
if($response->isSuccess()) {
    $user_id = $response->getResponse("user_id");
    $token  = $response->getResponse("token");
} else {
    echo $response->getErrorMessage();
}
```

#### Create an application

```
$response = \Siberian\Application::create($name, $user_id);
if($response->isSuccess()) {
    $app_id = $response->getResponse("app_id");
    $app_url  = $response->getResponse("app_url");
} else {
    echo $response->getErrorMessage();
}
```

Other actionss are documented here [API Documentation](http://developer.siberiancms.com/api/)


#### Run test (on you development instance)

Basic Auth

```
./run-test.sh siberianurl basic username password
```

Bearer token

```
./run-test.sh siberianurl bearer token
```