<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Affiliate;

class AdminController extends Controller
{

    public function getAffiliateUsers()
    {
        try {
            $afffiliates = Affiliate::get();
            $response = [
                'code' => 200,
                'data' => [
                    'afffiliates' => $afffiliates,
                ],
            ];
        } catch (\Exception $exc) {
            $response = [
                'code' => $exc->getCode(),
                'error' => $exc->getMessage(),
            ];
        }

        return response()->json($response, 200);
    }

}
