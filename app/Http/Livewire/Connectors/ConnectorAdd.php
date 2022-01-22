<?php

namespace App\Http\Livewire\Connectors;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Actions\Connectors\ShopifyInstall;
use App\Actions\Contracts\ConnectorsInstall;
use App\Actions\Connectors\WoocommerceInstall;

class ConnectorAdd extends Component
{
    public $showingModal = true;
    public $state = [];

    public function render()
    {
        return view('livewire.connectors.connector-add');
    }

    public function submit()
    {
        Validator::make($this->state, [
            'type' => ['required', 'in:shopify,woocommerce'],
            'url' => ['required', 'url'],
        ])->validate();

        // Auth::user()->updateSetting('nextUrl', '/setup/step2');

        if ($this->state['type'] == 'shopify') {
            $installer = new ShopifyInstall();
        } else {
            $installer = new WoocommerceInstall();
        }

        $installUrl = $installer->install(Auth::user(), $this->state);

        return redirect($installUrl);
    }
}