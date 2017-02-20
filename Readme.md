# PHP HTTP Request Library

I am using the library for my codeigniter projects.
But it is not mean you have to use only for codeigniter.

# Usage for Codeigniter

copy class file under your codeigniter application library folder.

1. load library

```php
$this->load->library('Http');
```

2. make request

```php
$response = $this->Http->request(URL, POSTDATA(Array), HEADERS(Array), CUSTOM(PUT|DELETE));
```

That's All
