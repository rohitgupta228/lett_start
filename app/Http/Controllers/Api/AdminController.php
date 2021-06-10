<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Affiliate;
use Mail;

class AdminController extends Controller
{

    public function getAffiliateUsers()
    {
        try {
            $afffiliates = Affiliate::get();
            $responseData = [];
//            foreach ($afffiliates as $key => $affiliate) {
//                $affiliate['user'] = $affiliate->user;
//            }
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

    public function updateAffiliateStatus(Request $request)
    {
        try {
            $userIds = $request->userIds;
            foreach ($userIds as $userId) {
                $affiliate = Affiliate::where('user_id', $userId)->first();
                $affiliate->update(['status' => 1]);
                $data = [
                    'subject' => 'Referral',
                    'template' => 'emails.referral',
                    'affiliate' => $affiliate
                ];
                Mail::to($affiliate->user->email)
                        ->send(new \App\Mail\Mailer($data));
            }
            return response()->json(['code' => 200,'message' => 'success'], 200);
        } catch (\Exception $exc) {
            return response()->json(['code' => $exc->getCode(),'message' => $exc->getCode()], $exc->getCode());
        }
    }

}
