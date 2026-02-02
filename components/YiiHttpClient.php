<?php

namespace app\components;

use yii\httpclient\Client;
use yii\httpclient\Exception;

class YiiHttpClient
{
    protected Client $client;

    /**
     * @param Client|null $client
     */
    public function __construct(Client $client = null)
    {
        $this->client = $client ?: new Client();
    }

    /**
     * @param string $url
     * @param array $query
     * @return mixed
     * @throws \RuntimeException
     */
    public function get(string $url, array $query = []): mixed
    {
        try {
            $response = $this->client->get($url, $query)->send();

            if (!$response->isOk) {
                throw new \RuntimeException('HTTP error: ' . $response->statusCode);
            }

            return $response->getData();
        } catch (Exception $e) {
            throw new \RuntimeException('HTTP request failed: ' . $e->getMessage(), 0, $e);
        }
    }
}
