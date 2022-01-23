<?php

namespace App\Actions\Connectors;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Actions\Contracts\ConnectorsInstall;
use App\Actions\Rules\ShopifyValidationRule;

class ShopifyInstall
{
    use ShopifyValidationRule;

    public function install($user, $input)
    {
        Validator::make($input, [
            'url' => $this->urlRules(),
        ])->validate();

        // Auth::user()->updateSetting('nextUrl', '/connectors');

        $url = parse_url($input['url']);
        // $url=array(
        //     "scheme" => "https",
        //     "host" => "shakil-retailer.myshopify.com",
        //     "path" => "/admin"
        // );
        return 'https://' . $url['host'] . '/admin/oauth/authorize?client_id=' . config('connector.shopify.key') . '&scope=read_orders,write_orders,read_customers,write_customers,read_products,write_products,read_inventory,write_inventory,read_locations,read_fulfillments,read_shipping&redirect_uri=' . secure_url('/shopify/callback');
    }
}