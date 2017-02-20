# PHP HTTP Request Library

I am using the library for my codeigniter projects.
But it is not mean you have to use only for codeigniter.

# Usage for Codeigniter

copy class file under your codeigniter application library folder.

1. load library

```php
$this->load->library('Http');
```

2. make any type of request 

```php
$response = $this->Http->Request(URL, POSTDATA(Array)(Optional), HEADERS(Array)(Optional), CUSTOM(PUT|DELETE)(Optional));
```

2. get request 

```php
$response = $this->Http->Get(URL, HEADERS(Array)(Optional));
```

2. post request 

```php
$response = $this->Http->Post(URL, POSTDATA(Array)(Optional), HEADERS(Array)(Optional));
```

2. put request 

```php
$response = $this->Http->Put(URL, POSTDATA(Array)(Optional), HEADERS(Array)(Optional));
```

2. delete request 

```php
$response = $this->Http->Delete(URL, POSTDATA(Array)(Optional), HEADERS(Array)(Optional));
```

That's All
