<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProductController extends Controller
{
	public function getProduct() {
		$client = new Client();

		try {
			$response = $client->request('GET', 'https://apidojo-hm-hennes-mauritz-v1.p.rapidapi.com/products/list?country=id&lang=id', [
				'headers' => [
					'x-rapidapi-host' => 'apidojo-hm-hennes-mauritz-v1.p.rapidapi.com',
					'x-rapidapi-key' => 'f8e4a9c12bmsh3d045d37eeb0f2ap11bbbdjsn69d5521db5b3',
				],
			]);
			$data = json_decode($response->getBody(), true);
			// Log the entire data structure to inspect it
			\Log::info($data);
			return view('products', ['productData' => $data]);
		} catch(\Exception $e) {
			return view('api-error', ['error' => $e->getMessage()]);
		}
	}
}
