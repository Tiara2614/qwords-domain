<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DomainController extends Controller
{
    public function checkDomain(Request $request)
    {
        $domain = $request->query('domain');

        if (!$domain) {
            return response()->json(['error' => 'Domain is required'], 400);
        }

        // Fetch data from the external API
        $response = Http::get("https://portal.qwords.com/apitest/whois.php?domain={$domain}");

        return $response->json() ?? response()->json([
            'result' => 'success',
            'status' => 'available',
            'whois' => null,
        ]);
    }

    public function checkout(Request $request)
    {
        $auth = Auth::check() ? Auth::user() : null;
        $request->session()->put('domain', $request->query('domain'));

        return view('checkout', ['auth' => $auth, 'domain' => $request->query('domain')]);
    }

    public function purchase(Request $request)
    {
        $param = [
            'invoice' => (object) [
                    'domain' => $request->input('domain'),
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'totalPrice' => $request->input('totalPrice'),
                ]
            ];

        if (!Auth::check()) {
            User::firstOrCreate(
                [
                    'email' => $request->input('email'),
                ],
                [
                    'name' => $request->input('name'),
                    'password' => bcrypt($request->input('password')),
                ]
            );
        }

        return view('invoice', $param);
    }
}
