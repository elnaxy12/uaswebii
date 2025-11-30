<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // ==========================
        // Etalase Sepatu (ID = 1)
        // ==========================

        $name = 'SAMBA OG SHOES';
        Product::create([
            'etalase_id' => 1,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 100,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/606f418a01a14c419ac35e7c84a5e2d2_9366/Samba_OG_Shoes_Brown_JR0891_00_plp_standard.jpg',
            'badge' => 'MENS ORIGINALS.',
            'stock'      => 20,
        ]);

        $name = 'SWIFT RUN 1.0 SHOES';
        Product::create([
            'etalase_id' => 1,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 60,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/9da93feaffd84fa5baf15e0b9727687a_9366/Swift_Run_1.0_Shoes_Grey_JR6898_00_plp_standard.jpg',
            'badge' => 'MENS SPORTSWEAR',
            'stock'      => 15,
        ]);

        $name = 'ULTRABOOST 1.0 SHOES';
        Product::create([
            'etalase_id' => 1,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 135,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/e694f6e9261b48d6b255ca8a1388d3d5_9366/ULTRABOOST_1.0_SHOES_White_JR1987_HM1.jpg',
            'badge' => 'MENS SPORTSWEAR',
            'stock'      => 15,
        ]);

        $name = 'GAZELLA INDOOR SHOES';
        Product::create([
            'etalase_id' => 1,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 120,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/911ec048adc4471f938af50867c2ad85_9366/Gazelle_Indoor_Shoes_Red_JI2063_00_plp_standard.jpg',
            'badge' => 'MENS ORIGINALS',
            'stock'      => 15,
        ]);

        $name = 'ADIZERO EVO SL SHOES';
        Product::create([
            'etalase_id' => 1,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 150,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/ed03f2b031b04884a8481cec1ccca4e2_9366/Adizero_EVO_SL_Shoes_Black_JP7149_00_plp_standard.jpg',
            'badge' => 'PERFORMANCE',
            'stock'      => 15,
        ]);

        $name = 'SAMBA OG SHOES';
        Product::create([
            'etalase_id' => 1,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 100,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/ee99b4b9bde74f30a933a8bf011911ae_9366/Samba_OG_Shoes_Black_B75807_00_plp_standard.jpg',
            'badge' => 'MENS ORIGINALS',
            'stock'      => 15,
        ]);

        $name = 'ULTRABOOST 1.0 SHOES';
        Product::create([
            'etalase_id' => 1,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 135,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/f0ca2dd8bdb84a2ab11faacb8802c4dc_9366/Ultraboost_1.0_Shoes_White_HQ4202_HM1.jpg',
            'badge' => 'MENS SPORTSWEAR',
            'stock'      => 15,
        ]);

        $name = 'SAMBA OG SHOES';
        Product::create([
            'etalase_id' => 1,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 100,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/507b9464089e4c818536b4613435aebf_9366/Samba_OG_Shoes_Blue_ID2056_00_plp_standard.jpg',
            'badge' => 'MENS ORIGINALS',
            'stock'      => 15,
        ]);

        $name = 'SAMBA OG SHOES';
        Product::create([
            'etalase_id' => 1,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 110,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/49d73d8eaccb48ee89ee3feb82ce098c_9366/Samba_OG_shoes_Black_JI2734_00_plp_standard.jpg',
            'badge' => 'WOMENS ORIGINALS',
            'stock'      => 15,
        ]);

        $name = 'SL 72 OG SHOES';
        Product::create([
            'etalase_id' => 1,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 110,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/6fb12406f5684eeea66762a868b73731_9366/SL_72_OG_Shoes_Brown_JI0189_00_plp_standard.jpg',
            'badge' => 'WOMENS ORIGINALS',
            'stock'      => 15,
        ]);

        $name = 'SL 72 OG SHOES';
        Product::create([
            'etalase_id' => 1,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 100,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/24ec18f0e35e491d8be5b38c9f09c11b_9366/SL_72_OG_Shoes_Brown_JS3981_00_plp_standard.jpg',
            'badge' => 'WOMENS ORIGINALS',
            'stock'      => 15,
        ]);

        $name = 'COW PRINT SAMBA LONG TONGUE SHOES';
        Product::create([
            'etalase_id' => 1,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 130,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/ad3d6d029e414c1ba24603629de60f5e_9366/Cow_Print_Samba_Long_Tongue_Shoes_White_JS3931_00_plp_standard.jpg',
            'badge' => 'WOMENS ORIGINALS',
            'stock'      => 15,
        ]);

        $name = 'SAMBA OG SHOES';
        Product::create([
            'etalase_id' => 1,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 100,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/3f97a71da3ae4cb98250122966491184_9366/Samba_OG_Shoes_White_IG9030_00_plp_standard.jpg',
            'badge' => 'WOMENS ORIGINALS',
            'stock'      => 15,
        ]);

        $name = 'SAMBA LONG TONGUE SHOES';
        Product::create([
            'etalase_id' => 1,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 120,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/1f525b85b19a4eda86742e0f46413bcf_9366/Samba_Long_Tongue_Shoes_White_JR5998_00_plp_standard.jpg',
            'badge' => 'WOMENS ORIGINALS',
            'stock'      => 15,
        ]);

        $name = 'SAMBA OG SHOES';
        Product::create([
            'etalase_id' => 1,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 100,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/89282cea6ef8495caff848b041a0a3ce_9366/Samba_OG_Shoes_Black_IE5836_00_plp_standard.jpg',
            'badge' => 'WOMENS ORIGINALS',
            'stock'      => 15,
        ]);

        $name = 'SAMBA OG SHOES';
        Product::create([
            'etalase_id' => 1,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 100,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/b668a22ed8ee475e87beafeeedb96657_9366/Samba_OG_Shoes_Silver_JR0035_00_plp_standard.jpg',
            'badge' => 'WOMENS ORIGINALS',
            'stock'      => 15,
        ]);

        $name = 'SAMBA OG SHOES KIDS';
        Product::create([
            'etalase_id' => 1,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 80,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/9fb258a11a25407ab06b52eed1cca37b_9366/Samba_OG_Shoes_Kids_White_IE3675_00_plp_standard.jpg',
            'badge' => 'ORIGINALS',
            'stock'      => 15,
        ]);

        $name = 'SAMBA OG SHOES';
        Product::create([
            'etalase_id' => 1,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 56,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/2c1a1838d62e4b23b8dddc26793bd47f_9366/Samba_OG_Shoes_Kids_White_JQ2843_00_plp_standard.jpg',
            'badge' => 'ORIGINALS',
            'stock'      => 15,
        ]);

        $name = 'SAMBA OG COMFORT CLOSURE ELASTIC LACE SHOES KIDS';
        Product::create([
            'etalase_id' => 1,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 39,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/e7e49fce7e54448da09a2983c4fa43d0_9366/Samba_OG_Comfort_Closure_Elastic_Lace_Shoes_Kids_White_JQ3190_00_plp_standard.jpg',
            'badge' => 'ORIGINALS',
            'stock'      => 15,
        ]);

        // ==========================
        // Etalase Bag (ID = 2)
        // ==========================

        $name = 'DEFENDER 5 SMALL DUFFEL BAG';
        Product::create([
            'etalase_id' => 2,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 28,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/80690c33e4d348c58dae6b01ad83e760_9366/Defender_5_Small_Duffel_Bag_Black_JJ7410_00_plp_standard.jpg',
            'badge' => 'SPORTSWEAR',
            'stock'      => 10,
        ]);

        // ==========================
        // Etalase Jersey (ID = 3)
        // ==========================

        $name = 'AL NASR FC 25/26 HOME JERSEY KIDS';
        Product::create([
            'etalase_id' => 3,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 75,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/27b6e3345f9a4d59a5357e0a4b8a6aa6_9366/Al_Nassr_FC_25-26_Home_Jersey_Kids_Yellow_JN7981_000_plp_model.jpg',
            'badge' => 'PERFORMANCE',
            'stock'      => 30,
        ]);

        $name = 'ARGENTINA 26 HOME MESSI KIDS JERSEY';
        Product::create([
            'etalase_id' => 3,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 110,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/fc50a8f55f56430897757b1d9e2e3231_9366/Argentina_26_Home_Messi_Kids_Jersey_White_KA8115_000_plp_model.jpg',
            'badge' => 'PERFORMANCE',
            'stock'      => 30,
        ]);

        $name = 'INTER MIAMI CF 25/26 MESSI AWAY JERSEY KIDS';
        Product::create([
            'etalase_id' => 3,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 66,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/09518a69e074496ca06e33bf071d4386_9366/Inter_Miami_CF_25-26_Messi_Away_Jersey_Kids_Black_JI6820_000_plp_model.jpg',
            'badge' => 'PERFORMANCE',
            'stock'      => 30,
        ]);

        // ==========================
        // Etalase Ball (ID = 4)
        // ==========================

        $name = 'FIFA WORLD CUP 26™ TRIONDA PRO BALL';
        Product::create([
            'etalase_id' => 4,
            'name'       => $name,
            'slug'       => Str::slug($name . '-' . uniqid()),
            'price'      => 170,
            'image'      => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/4229e87f23044869a5218fbc64c4fd71_9366/FIFA_World_Cup_26tm_Trionda_Pro_Ball_White_JD8021_HM1.jpg',
            'badge' => 'PERFORMANCE',
            'stock'      => 30,
        ]);
    }

}
