# PHP HTTP Request Library

> I am using the simple library for my codeigniter projects. But it is not mean you have to use only for codeigniter. It is simple but also usefull for me.

# Usage for Codeigniter

copy class file under your codeigniter application library folder.



* load library

```php
$this->load->library('Http');
```

* make any type of request 

```php
$response = $this->Http->Request(URL, POSTDATA(Array)(Optional), HEADERS(Array)(Optional), CUSTOM(PUT|DELETE)(Optional));
```

* get request 

```php
$response = $this->Http->Get(URL, HEADERS(Array)(Optional));
```

* post request 

```php
$response = $this->Http->Post(URL, POSTDATA(Array)(Optional), HEADERS(Array)(Optional));
```

* put request 

```php
$response = $this->Http->Put(URL, POSTDATA(Array)(Optional), HEADERS(Array)(Optional));
```

* delete request 

```php
$response = $this->Http->Delete(URL, POSTDATA(Array)(Optional), HEADERS(Array)(Optional));
```

That's All
