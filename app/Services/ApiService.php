<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService
{
    const API_BASE_URL = 'https://api.coinbase.com/v2/';

    public function callApi(string $endpoint, array $params = []): ?array
    {
        $response = Http::get(self::API_BASE_URL . $endpoint, $params);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }

    public function getValidCurrencies(): ?array
    {
        return $this->callApi('currencies');
    }

    public function getCryptocurrencies(): ?array
    {
        return $this->callApi('currencies/crypto');
    }

    public function getAllCurrencies(): ?array
    {
        $fiatCurrencies = $this->getValidCurrencies();
        $cryptoCurrencies = $this->getCryptocurrencies();
        if (!$fiatCurrencies || !$cryptoCurrencies) {
            return null;
        }

        $allCurrencies = array_merge($fiatCurrencies['data'] ?? [], $cryptoCurrencies['data'] ?? []);
        return ['data' => $allCurrencies];
    }

    public function getCurrencyPairPrice(string $baseCurrency, string $quoteCurrency): ?array
    {
        $endpoint = "prices/{$baseCurrency}-{$quoteCurrency}/spot";
        
        $response = $this->callApi($endpoint);

        if ($response && isset($response['data'])) {
            return $response['data'];
        }

        return null;
    }
}