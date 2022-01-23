<?php

namespace App\Actions\Connectors;

use Illuminate\Support\Facades\Validator;
use App\Actions\Contracts\ConnectorsInstall;

class WoocommerceInstall
{
    public function install($user, $input)
    {
        Validator::make($input, [
            'url' => ['required', 'url'],
        ])->validate();

        $url = parse_url($input['url']);
        $user->updateSetting('wooHost', $url['host']);

        $params = [
            'app_name' => 'Dropship Connect',
            'scope' => 'read_write',
            'user_id' => $user->id,
            'return_url' => route('dashboard'),
            'callback_url' => route('woocommerce.callback')
        ];

        return 'https://' . $url['host'] . '/wc-auth/v1/authorize?' . http_build_query($params, '', '&', PHP_QUERY_RFC3986);
    }
}