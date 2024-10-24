

```shell
 composer require plutuss/here-coding-geo
```

```shell
php artisan vendor:publish --provider="Plutuss\HerePlatform\Providers\GeoCodingServiceProvider"
```

```dotenv
HERE_APP_ID=
HERE_API_KEY=
```

- geocodeSearch()
- reverse()
- discover()
- autocomplete()
```php
    
    $result = GeoCoding::autocomplete('city street  houseNumber');
     
    
    /**
     * @var GeoCodingResponseInterface[]|HasParameterInterface[] $result
     */
     
    foreach ($result as $item) {
     echo "{$item->title()} <br/>";
    }

```
