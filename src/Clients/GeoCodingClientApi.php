<?php

namespace Plutuss\HerePlatform\Clients;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Plutuss\HerePlatform\Response\GeoCodingResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Plutuss\HerePlatform\Contracts\Response\GeoCodingResponseInterface;

class GeoCodingClientApi
{

    /**
     * @var string
     */
    private string $appId;

    /**
     * @var string
     */
    private string $apiKey;

    /**
     * @var array
     */
    protected array $params = [];

    /**
     * @var string
     */
    private string $url;

    /**
     * @var null|static
     */
    private static $instance = null;

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function __construct()
    {
        $this->initConfig();
    }

    private function initConfig(): void
    {
        $this->appId = config('here-platform.key.app_id');
        $this->apiKey = config('here-platform.key.api_key');
    }

    /**
     * @return static
     */
    public static function getInstance(): static
    {
        if (!(static::$instance instanceof static)) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * @param array $params
     * @return $this
     */
    public function setOption(array $params = []): static
    {
        $this->params = $params;
        return $this;
    }

    public function sendGet(): GeoCodingResponseInterface|HttpException|Collection
    {

        try {
            $response = Http::get($this->url, [
                ...$this->params,
                'apiKey' => $this->apiKey
            ]);
        } catch (HttpException $exception) {
            throw new HttpException(500, $exception->getMessage());
        }

        return $this->getResponse($response->status(), $response->json());
    }


    public function geocodeSearchUrl(): static
    {
        $this->url = $this->getUrlFromConfigByKey('geocode_search');
        return $this;
    }

    public function reverseGeocodeUrl(): static
    {
        $this->url = $this->getUrlFromConfigByKey('reverse_geocode');
        return $this;
    }

    public function discoverUrl(): static
    {
        $this->url = $this->getUrlFromConfigByKey('discover');
        return $this;
    }

    public function autocompleteUrl(): static
    {
        $this->url = $this->getUrlFromConfigByKey('autocomplete');
        return $this;
    }

    private function getUrlFromConfigByKey(string $key): string
    {
        return trim(config('here-platform.urls.' . $key));
    }

    private function getResponse(int $status, mixed $data): GeoCodingResponseInterface|HttpException|Collection
    {
        if ($status == 200) {
            if (count($data['items']) > 0)
                return collect(value: $data['items'])->map(function ($item): GeoCodingResponseInterface {
                    return new GeoCodingResponse(collect($item));
                });

            return new GeoCodingResponse(collect([]));

        }

        throw new HttpException($status, $data['title']);

    }
}
