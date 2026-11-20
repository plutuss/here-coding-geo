<?php

namespace Plutuss\HerePlatform\Clients;

use Illuminate\Support\Facades\Http;
use Plutuss\HerePlatform\Response\GeoCodingResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class GeoCodingClientApi
{

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
        $this->apiKey = (string) config('here-platform.key.api_key', '');
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

    /**
     * @return GeoCodingResponse[]
     */
    public function sendGet(): mixed
    {
        $response = Http::get($this->url, array_merge(
            $this->params,
            ['apiKey' => $this->apiKey]
        ));

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


    /**
     * @param int $status
     * @param mixed $data
     * @return GeoCodingResponse[]
     */
    private function getResponse(int $status, mixed $data): array
    {
        if ($status !== 200) {
            $title = is_array($data) ? ($data['title'] ?? null) : null;
            $message = is_string($title) && trim($title) !== ''
                ? $title
                : "HERE API returned HTTP {$status}.";

            throw new HttpException($status, $message);
        }

        $items = is_array($data) ? ($data['items'] ?? null) : null;
        if (!is_array($items)) {
            throw new HttpException(502, 'HERE API returned an invalid items list.');
        }

        foreach ($items as $key => $item) {
            if (!is_array($item)) {
                throw new HttpException(502, 'HERE API returned an invalid result item.');
            }

            $items[$key] = new GeoCodingResponse(collect($item));
        }

        return $items;
    }
}
