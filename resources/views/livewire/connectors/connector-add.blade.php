<div>
    <x-button.default wire:click.prevent="$set('showingModal', true)" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
    </x-button.default>

    <x-new-modal wire:model="showingModal" maxWidth="md" justify="end" title="Add A Connecor">
        <div class="w-full" x-data="{ selected: false }">
            <h2 class="font-bold text-center">Lets Start By Connecting Your Store</h2>
            <p class="mb-8 text-center">Select a platform to connect</p>
            <div class="flex items-center justify-center pb-4 my-4 space-x-4 border-b">
                <div @click="selected = 'shopify'" wire:click.prevent="$set('state.type', 'shopify')"
                    :class="{ 'bg-gray-200' : selected === 'shopify' }" class="w-1/3 p-4 rounded-lg"><img
                        src="{{ secure_asset('img/shopify.png') }}" title="Connect a Shopify store" /></div>
                <div @click="selected = 'woocommerce'" wire:click.prevent="$set('state.type', 'woocommerce')"
                    :class="{ 'bg-gray-200' : selected === 'woocommerce' }" class="w-1/3 p-4 rounded-lg"><img
                        src="{{ secure_asset('img/woocommerce.png') }}" title="Connect a WooCommerce store" /></div>
                <x-input-error for="type" class="mt-2" />
            </div>

            <form x-show="selected !== ''" wire:submit.prevent="submit" class="flex flex-col ">
                @csrf
                <input type="hidden" name="type" :value="selected" />

                <div x-show="selected === 'shopify'">
                    <x-form.input wire:model="state.url" name="shopify-url"
                        placeholder="https://storename.myshopify.com/admin"
                        description="Log into your Shopify admin screen on another tab, then copy the URL in the browser and paste here. We will use this to determine where to install the DropshipConnect app.">
                        Shopify admin URL</x-form.input>

                    <div class="flex justify-center my-8">
                        <img src="{{ url('/img/shopify-url-example.png') }}" />
                    </div>
                </div>

                <div x-show="selected === 'woocommerce'">
                    <x-form.input wire:model="state.url" name="woocommerce-url"
                        placeholder="https://yourstore.com/wp-admin"
                        description="Log into your Woocommerce admin screen on another tab, then copy the URL in the browser and paste here. We will use this to determine where to install the Dropship Connect app.">
                        Woocommerce admin URL</x-form.input>

                    <div class="flex justify-center my-8">
                        <img src="{{ url('/img/woocommerce-url-example.png') }}" />
                    </div>
                </div>

                <x-input-error for="url" class="mt-2" />

                <div class="flex items-center justify-evenly">
                    <x-button.dark x-show="selected">Next</x-button.dark>
                    <x-button.default wire:click.prevent="$set('showingModal', false)" type="button">Cancel
                    </x-button.default>
                </div>
            </form>
        </div>
    </x-new-modal>
</div>
