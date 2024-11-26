<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function showData()
    {
        $client = new Client();

        try {
            // Mengambil data dari API Hapi.js
            $response = $client->get('http://localhost:3001/api/data');
            $data = json_decode($response->getBody()->getContents(), true);

            // Meneruskan data ke view Blade
            return view('dataView', ['data' => $data]);
        } catch (\Exception $e) {
            // Mengirimkan pesan error jika gagal
            return view('dataView', ['error' => 'Gagal mengakses server Hapi.js']);
        }
    }
}