<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Currency::class)->create([
            'name' => 'AED',
        ]);
        factory(Currency::class)->create([
            'name' => 'ARS',
        ]);
        factory(Currency::class)->create([
            'name' => 'AUD',
        ]);
        factory(Currency::class)->create([
            'name' => 'BGN',
        ]);
        factory(Currency::class)->create([
            'name' => 'BRL',
        ]);
        factory(Currency::class)->create([
            'name' => 'BWP',
        ]);
        factory(Currency::class)->create([
            'name' => 'CAD',
        ]);
        factory(Currency::class)->create([
            'name' => 'CFA',
        ]);
        factory(Currency::class)->create([
            'name' => 'CHF',
        ]);
        factory(Currency::class)->create([
            'name' => 'CNY',
        ]);
        factory(Currency::class)->create([
            'name' => 'COP',
        ]);
        factory(Currency::class)->create([
            'name' => 'CRC',
        ]);
        factory(Currency::class)->create([
            'name' => 'CZK',
        ]);
        factory(Currency::class)->create([
            'name' => 'DKK',
        ]);
        factory(Currency::class)->create([
            'name' => 'EUR',
        ]);
        factory(Currency::class)->create([
            'name' => 'GBP',
        ]);
        factory(Currency::class)->create([
            'name' => 'GHS',
        ]);
        factory(Currency::class)->create([
            'name' => 'HKD',
        ]);
        factory(Currency::class)->create([
            'name' => 'HUF',
        ]);
        factory(Currency::class)->create([
            'name' => 'ILS',
        ]);
        factory(Currency::class)->create([
            'name' => 'INR',
        ]);
        factory(Currency::class)->create([
            'name' => 'JPY',
        ]);
        factory(Currency::class)->create([
            'name' => 'KES',
        ]);
        factory(Currency::class)->create([
            'name' => 'MAD',
        ]);
        factory(Currency::class)->create([
            'name' => 'MOP',
        ]);
        factory(Currency::class)->create([
            'name' => 'MUR',
        ]);
        factory(Currency::class)->create([
            'name' => 'MXN',
        ]);
        factory(Currency::class)->create([
            'name' => 'MYR',
        ]);
        factory(Currency::class)->create([
            'name' => 'NGN',
        ]);
        factory(Currency::class)->create([
            'name' => 'NOK',
        ]);
        factory(Currency::class)->create([
            'name' => 'NZD',
        ]);
        factory(Currency::class)->create([
            'name' => 'PEN',
        ]);
        factory(Currency::class)->create([
            'name' => 'PHP',
        ]);
        factory(Currency::class)->create([
            'name' => 'PLN',
        ]);
        factory(Currency::class)->create([
            'name' => 'RUB',
        ]);
        factory(Currency::class)->create([
            'name' => 'RWF',
        ]);
        factory(Currency::class)->create([
            'name' => 'SAR',
        ]);
        factory(Currency::class)->create([
            'name' => 'SEK',
        ]);
        factory(Currency::class)->create([
            'name' => 'SGD',
        ]);
        factory(Currency::class)->create([
            'name' => 'SLL',
        ]);
        factory(Currency::class)->create([
            'name' => 'THB',
        ]);
        factory(Currency::class)->create([
            'name' => 'TRY',
        ]);
        factory(Currency::class)->create([
            'name' => 'TWD',
        ]);
        factory(Currency::class)->create([
            'name' => 'TZS',
        ]);
        factory(Currency::class)->create([
            'name' => 'UGX',
        ]);
        factory(Currency::class)->create([
            'name' => 'USD',
        ]);
        factory(Currency::class)->create([
            'name' => 'VEF',
        ]);
        factory(Currency::class)->create([
            'name' => 'XAF',
        ]);
        factory(Currency::class)->create([
            'name' => 'XOF',
        ]);
        factory(Currency::class)->create([
            'name' => 'ZAR',
        ]);
        factory(Currency::class)->create([
            'name' => 'ZMK',
        ]);
        factory(Currency::class)->create([
            'name' => 'ZMW',
        ]);
        factory(Currency::class)->create([
            'name' => 'ZMD',
        ]);
    }
}
