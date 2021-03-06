This is my personal website.

[![Build Status](https://travis-ci.com/ellllllen/portfolio-v1.svg?branch=master)](https://travis-ci.com/ellllllen/portfolio-v1)
[![codecov](https://codecov.io/gh/ellllllen/portfolio-v1/branch/master/graph/badge.svg)](https://codecov.io/gh/ellllllen/portfolio-v1)

## Usage

### Articles

If you are adding an article that needs additional logic you can send the request to a separate
controller, which then sends the response back, in this instance it is a view (Illuminate\View\View).

#### Example

If an article requires a collection of objects that need to be gathered, instead of putting that logic in the
ArticleController@show method (which will be called every time you load an article, even when it doesn't need it) it
will allow it to go to a different controller (where the gathering can be done) and return a view.

1. Create the separate controller and extend the ShowArticle abstract class:

```php
class BooksController extends ShowArticle
{
    public function __construct(GetBooks $getBooks)
    {
        $this->getBooks = $getBooks;
    }

    public function show(Article $article): View
    {
        return view('articles.show.books', compact('article'))
            ->with('books', $this->getBooks->get());
    }
}
```

2. Create the view and extend the articles.show blade template

```blade
@extends('articles.show')
```

3. Append the additional content within the view

```blade
@section('additional-content')
    {{ print_r($books) }}
@append
```

4. Declare the separate controller within the separate-controllers array in file config/articles.php. Where the key is
   the article id (primary key) and the value is the controller path.

```php
return [
    'separate-controllers' => [
        4 => BooksController::class
    ]
];
```

# Development
## Prerequisites
* Docker

## Set Up Instructions
In your terminal run commands:

```docker-compose up --build -d```

```docker exec --tty portfolio-v1_php_1 php artisan key:generate```

```docker exec --tty portfolio-v1_php_1 composer update```

## Run Tests
```docker exec --tty portfolio-v1_php_1 php artisan migrate```

```docker exec --tty portfolio-v1_php_1 vendor/bin/phpunit tests```
