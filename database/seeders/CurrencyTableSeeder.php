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
        $currencies = [
            'AED', 'ARS', 'AUD', 'BGN', 'BRL', 'BWP', 'CAD', 'CFA', 'CHF', 'CNY', 'COP',
            'CRC', 'CZK', 'DKK', 'EUR', 'GBP', 'GHS', 'HKD', 'HUF', 'ILS', 'INR', 'JPY',
            'KES', 'MAD', 'MOP', 'MUR', 'MXN', 'MYR', 'NGN', 'NOK', 'NZD', 'PEN',
            'PHP', 'PLN', 'RUB', 'RWF', 'SAR', 'SEK', 'SGD', 'SLL', 'THB', 'TRY', 'TWD',
            'TZS', 'UGX', 'USD', 'VEF', 'XAF', 'XOF', 'ZAR', 'ZMK', 'ZMW', 'ZMD'
        ];
        
        foreach ($currencies as $currency) {
            factory(Currency::class)->create([
                'name' => $currency,
            ]);
        }
    }
}
