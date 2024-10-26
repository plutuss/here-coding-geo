

```shell
 composer require plutuss/here-coding-geo
```

```shell
php artisan vendor:publish --provider="Plutuss\HerePlatform\Providers\GeoCodingServiceProvider"
```

[Hereapi API KEY]('https://www.here.com/docs/bundle/identity-and-access-management-developer-guide/page/topics/plat-using-apikeys.html')
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
     * @var GeoCodingResponseInterface[] $result
     */
     
    foreach ($result as $item) {
     echo "{$item->title()} <br/>";
    }

```
