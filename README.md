# Twig template view for Dietcake

[![Build Status](https://travis-ci.org/xcezx/dietcake-twig-view.png?branch=master)](https://travis-ci.org/xcezx/dietcake-twig-view)

## Requirements

- PHP 5.3
- Twig
- Dietcake

## Installation

```json
{
    "require": {
        "xcezx/dietcake-twig-view": "dev-master"
    }
}
```

## Usage

```php
class DemoController extends Controller
{
    private $default_view_class = 'TwigView';

    public function hello()
    {
        $this->set('name', 'John Doe');
    }
}
```

```html
<!-- views/demo/hello.twig -->
<h1>Hello {{ name }}</h1>
```
