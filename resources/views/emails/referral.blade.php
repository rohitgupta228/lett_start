Hi {{ $data['affiliate']->user->username }}

Please find your referral link below

{{ env('FRONT_END_BASE_URL')."?code=" . $data['affiliate']->affiliate_code }}