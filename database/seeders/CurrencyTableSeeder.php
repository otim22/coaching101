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
            'slug' => 'aed',
        ]);
        factory(Currency::class)->create([
            'name' => 'ARS',
            'slug' => 'ars',
        ]);
        factory(Currency::class)->create([
            'name' => 'AUD',
            'slug' => 'aud',
        ]);
        factory(Currency::class)->create([
            'name' => 'BGN',
            'slug' => 'bgn',
        ]);
        factory(Currency::class)->create([
            'name' => 'BRL',
            'slug' => 'brl',
        ]);
        factory(Currency::class)->create([
            'name' => 'BWP',
            'slug' => 'bwp',
        ]);
        factory(Currency::class)->create([
            'name' => 'CAD',
            'slug' => 'cad',
        ]);
        factory(Currency::class)->create([
            'name' => 'CFA',
            'slug' => 'cfa',
        ]);
        factory(Currency::class)->create([
            'name' => 'CHF',
            'slug' => 'chf',
        ]);
        factory(Currency::class)->create([
            'name' => 'CNY',
            'slug' => 'cny',
        ]);
        factory(Currency::class)->create([
            'name' => 'COP',
            'slug' => 'cop',
        ]);
        factory(Currency::class)->create([
            'name' => 'CRC',
            'slug' => 'crc',
        ]);
        factory(Currency::class)->create([
            'name' => 'CZK',
            'slug' => 'czk',
        ]);
        factory(Currency::class)->create([
            'name' => 'DKK',
            'slug' => 'dkk',
        ]);
        factory(Currency::class)->create([
            'name' => 'EUR',
            'slug' => 'eur',
        ]);
        factory(Currency::class)->create([
            'name' => 'GBP',
            'slug' => 'gbp',
        ]);
        factory(Currency::class)->create([
            'name' => 'GHS',
            'slug' => 'ghs',
        ]);
        factory(Currency::class)->create([
            'name' => 'HKD',
            'slug' => 'hkd',
        ]);
        factory(Currency::class)->create([
            'name' => 'HUF',
            'slug' => 'huf',
        ]);
        factory(Currency::class)->create([
            'name' => 'ILS',
            'slug' => 'ils',
        ]);
        factory(Currency::class)->create([
            'name' => 'INR',
            'slug' => 'inr',
        ]);
        factory(Currency::class)->create([
            'name' => 'JPY',
            'slug' => 'jpy',
        ]);
        factory(Currency::class)->create([
            'name' => 'KES',
            'slug' => 'kes',
        ]);
        factory(Currency::class)->create([
            'name' => 'MAD',
            'slug' => 'map',
        ]);
        factory(Currency::class)->create([
            'name' => 'MOP',
            'slug' => 'mop',
        ]);
        factory(Currency::class)->create([
            'name' => 'MUR',
            'slug' => 'mur',
        ]);
        factory(Currency::class)->create([
            'name' => 'MXN',
            'slug' => 'mxn',
        ]);
        factory(Currency::class)->create([
            'name' => 'MYR',
            'slug' => 'myr',
        ]);
        factory(Currency::class)->create([
            'name' => 'NGN',
            'slug' => 'ngn',
        ]);
        factory(Currency::class)->create([
            'name' => 'NOK',
            'slug' => 'nok',
        ]);
        factory(Currency::class)->create([
            'name' => 'NZD',
            'slug' => 'nzd',
        ]);
        factory(Currency::class)->create([
            'name' => 'PEN',
            'slug' => 'pen',
        ]);
        factory(Currency::class)->create([
            'name' => 'PHP',
            'slug' => 'php',
        ]);
        factory(Currency::class)->create([
            'name' => 'PLN',
            'slug' => 'pln',
        ]);
        factory(Currency::class)->create([
            'name' => 'RUB',
            'slug' => 'rub',
        ]);
        factory(Currency::class)->create([
            'name' => 'RWF',
            'slug' => 'rwf',
        ]);
        factory(Currency::class)->create([
            'name' => 'SAR',
            'slug' => 'sar',
        ]);
        factory(Currency::class)->create([
            'name' => 'SEK',
            'slug' => 'sek',
        ]);
        factory(Currency::class)->create([
            'name' => 'SGD',
            'slug' => 'sgd',
        ]);
        factory(Currency::class)->create([
            'name' => 'SLL',
            'slug' => 'sll',
        ]);
        factory(Currency::class)->create([
            'name' => 'THB',
            'slug' => 'thb',
        ]);
        factory(Currency::class)->create([
            'name' => 'TRY',
            'slug' => 'try',
        ]);
        factory(Currency::class)->create([
            'name' => 'TWD',
            'slug' => 'twd',
        ]);
        factory(Currency::class)->create([
            'name' => 'TZS',
            'slug' => 'tzs',
        ]);
        factory(Currency::class)->create([
            'name' => 'UGX',
            'slug' => 'ugx',
        ]);
        factory(Currency::class)->create([
            'name' => 'USD',
            'slug' => 'usd',
        ]);
        factory(Currency::class)->create([
            'name' => 'VEF',
            'slug' => 'vef',
        ]);
        factory(Currency::class)->create([
            'name' => 'XAF',
            'slug' => 'xaf',
        ]);
        factory(Currency::class)->create([
            'name' => 'XOF',
            'slug' => 'xof',
        ]);
        factory(Currency::class)->create([
            'name' => 'ZAR',
            'slug' => 'zar',
        ]);
        factory(Currency::class)->create([
            'name' => 'ZMK',
            'slug' => 'zmk',
        ]);
        factory(Currency::class)->create([
            'name' => 'ZMW',
            'slug' => 'zmw',
        ]);
        factory(Currency::class)->create([
            'name' => 'ZMD',
            'slug' => 'zmd',
        ]);
    }
}
