<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->longText('about')->nullable();
            $table->string('shop_url')->nullable();
            $table->string('logo_path')->nullable();
            $table->boolean('partner')->default(false);
            $table->boolean('active')->default(false);
            $table->json('settings')->nullable();
            $table->foreignId('partner_id')->nullable()->constrained('accounts');
            $table->foreignId('owner_id')->nullable();
            $table->string('stripe_account_id')->nullable()->collation('utf8mb4_bin')->index();
            $table->string('stripe_id')->nullable()->collation('utf8mb4_bin')->index();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four', 4)->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('billed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}