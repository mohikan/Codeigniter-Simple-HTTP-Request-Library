## Codeigniter Simple HTTP Request Library

> I am using the simple library for my codeigniter projects. But it is not mean you have to use only for codeigniter. It is simple but also usefull for me.

### Usage for Codeigniter

> copy class file under your codeigniter application library folder.



* load library

```php
$this->load->library('Http');
```

or with config

```php
$config = array(
  'ssl_verify_peer'   => true,
  'ssl_verif_host'    => true,
  'request_timeout'   => 30,
  'response_timeout'  => 90,
  'accept_cookies'    => false,
  'keep_cookies'      => false
);

$this->load->library('Http', $config);
```

Codeigniter case sensitive for methods.


* make any type of request 

```php
$response = $this->http->request(URL, POSTDATA(Array)(Optional), HEADERS(Array)(Optional), CUSTOM(PUT|DELETE)(Optional));
```

* get request 

```php
$response = $this->http->get(URL, HEADERS(Array)(Optional));
```

* post request 

```php
$response = $this->http->post(URL, POSTDATA(Array)(Optional), HEADERS(Array)(Optional));
```

* put request 

```php
$response = $this->http->put(URL, POSTDATA(Array)(Optional), HEADERS(Array)(Optional));
```

* delete request 

```php
$response = $this->http->delete(URL, POSTDATA(Array)(Optional), HEADERS(Array)(Optional));
```

That's All
