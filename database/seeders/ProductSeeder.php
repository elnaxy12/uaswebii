<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Etalase;
use App\Models\Size;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan EtalaseSeeder dan SizeSeeder sudah dijalankan
        $etalases = Etalase::all();
        $sizes = Size::all();
        
        if ($etalases->isEmpty()) {
            $this->command->warn('Etalase table is empty! Run EtalaseSeeder first.');
            $this->call(EtalaseSeeder::class);
            $etalases = Etalase::all();
        }
        
        if ($sizes->isEmpty()) {
            $this->command->warn('Size table is empty! Run SizeSeeder first.');
            $this->call(SizeSeeder::class);
            $sizes = Size::all();
        }
        
        // Cari etalase berdasarkan slug atau buat default
        $shoesEtalase = $etalases->firstWhere('slug', 'originals') ?? 
                       $etalases->firstWhere('slug', 'mens-shoes') ?? 
                       $etalases->first();
        
        $bagEtalase = $etalases->firstWhere('slug', 'casual') ?? 
                     $etalases->firstWhere('name', 'like', '%bag%') ?? 
                     $etalases->skip(1)->first() ?? $etalases->first();
        
        $jerseyEtalase = $etalases->firstWhere('slug', 'sports') ?? 
                        $etalases->firstWhere('name', 'like', '%sport%') ?? 
                        $etalases->skip(2)->first() ?? $etalases->first();
        
        $ballEtalase = $etalases->firstWhere('slug', 'sports') ?? 
                      $etalases->firstWhere('name', 'like', '%sport%') ?? 
                      $etalases->skip(2)->first() ?? $etalases->first();
        
        // Data produk lengkap
        $products = [
            // ==========================
            // SEPATU (Shoes)
            // ==========================
            [
                'name' => 'SAMBA OG SHOES - Brown',
                'price' => 100.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/606f418a01a14c419ac35e7c84a5e2d2_9366/Samba_OG_Shoes_Brown_JR0891_00_plp_standard.jpg',
                'badge' => 'MENS ORIGINALS',
                'etalase' => $shoesEtalase,
                'description' => 'Classic leather sneakers with gum sole',
                'category' => 'shoes',
            ],
            [
                'name' => 'SWIFT RUN 1.0 SHOES',
                'price' => 60.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/9da93feaffd84fa5baf15e0b9727687a_9366/Swift_Run_1.0_Shoes_Grey_JR6898_00_plp_standard.jpg',
                'badge' => 'MENS SPORTSWEAR',
                'etalase' => $shoesEtalase,
                'description' => 'Lightweight running shoes for everyday wear',
                'category' => 'shoes',
            ],
            [
                'name' => 'ULTRABOOST 1.0 SHOES - White',
                'price' => 135.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/e694f6e9261b48d6b255ca8a1388d3d5_9366/ULTRABOOST_1.0_SHOES_White_JR1987_HM1.jpg',
                'badge' => 'MENS SPORTSWEAR',
                'etalase' => $shoesEtalase,
                'description' => 'Premium running shoes with Boost technology',
                'category' => 'shoes',
            ],
            [
                'name' => 'GAZELLE INDOOR SHOES',
                'price' => 120.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/911ec048adc4471f938af50867c2ad85_9366/Gazelle_Indoor_Shoes_Red_JI2063_00_plp_standard.jpg',
                'badge' => 'MENS ORIGINALS',
                'etalase' => $shoesEtalase,
                'description' => 'Indoor soccer shoes with classic design',
                'category' => 'shoes',
            ],
            [
                'name' => 'ADIZERO EVO SL SHOES',
                'price' => 150.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/ed03f2b031b04884a8481cec1ccca4e2_9366/Adizero_EVO_SL_Shoes_Black_JP7149_00_plp_standard.jpg',
                'badge' => 'PERFORMANCE',
                'etalase' => $shoesEtalase,
                'description' => 'Lightweight racing shoes for professional runners',
                'category' => 'shoes',
            ],
            [
                'name' => 'SAMBA OG SHOES - Black Classic',
                'price' => 100.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/ee99b4b9bde74f30a933a8bf011911ae_9366/Samba_OG_Shoes_Black_B75807_00_plp_standard.jpg',
                'badge' => 'MENS ORIGINALS',
                'etalase' => $shoesEtalase,
                'description' => 'Classic black leather sneakers',
                'category' => 'shoes',
            ],
            [
                'name' => 'ULTRABOOST 1.0 SHOES - White Premium',
                'price' => 135.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/f0ca2dd8bdb84a2ab11faacb8802c4dc_9366/Ultraboost_1.0_Shoes_White_HQ4202_HM1.jpg',
                'badge' => 'MENS SPORTSWEAR',
                'etalase' => $shoesEtalase,
                'description' => 'White premium running shoes',
                'category' => 'shoes',
            ],
            [
                'name' => 'SAMBA OG SHOES - Blue',
                'price' => 100.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/507b9464089e4c818536b4613435aebf_9366/Samba_OG_Shoes_Blue_ID2056_00_plp_standard.jpg',
                'badge' => 'MENS ORIGINALS',
                'etalase' => $shoesEtalase,
                'description' => 'Blue leather sneakers with white stripes',
                'category' => 'shoes',
            ],
            [
                'name' => 'SAMBA OG SHOES - Women Black',
                'price' => 110.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/49d73d8eaccb48ee89ee3feb82ce098c_9366/Samba_OG_shoes_Black_JI2734_00_plp_standard.jpg',
                'badge' => 'WOMENS ORIGINALS',
                'etalase' => $shoesEtalase,
                'description' => 'Women\'s classic black sneakers',
                'category' => 'shoes',
            ],
            [
                'name' => 'SL 72 OG SHOES - Brown',
                'price' => 110.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/6fb12406f5684eeea66762a868b73731_9366/SL_72_OG_Shoes_Brown_JI0189_00_plp_standard.jpg',
                'badge' => 'WOMENS ORIGINALS',
                'etalase' => $shoesEtalase,
                'description' => 'Vintage style sneakers for women',
                'category' => 'shoes',
            ],
            [
                'name' => 'SL 72 OG SHOES - Light Brown',
                'price' => 100.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/24ec18f0e35e491d8be5b38c9f09c11b_9366/SL_72_OG_Shoes_Brown_JS3981_00_plp_standard.jpg',
                'badge' => 'WOMENS ORIGINALS',
                'etalase' => $shoesEtalase,
                'description' => 'Light brown vintage sneakers',
                'category' => 'shoes',
            ],
            [
                'name' => 'COW PRINT SAMBA LONG TONGUE SHOES',
                'price' => 130.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/ad3d6d029e414c1ba24603629de60f5e_9366/Cow_Print_Samba_Long_Tongue_Shoes_White_JS3931_00_plp_standard.jpg',
                'badge' => 'WOMENS ORIGINALS',
                'etalase' => $shoesEtalase,
                'description' => 'Unique cow print design with long tongue',
                'category' => 'shoes',
            ],
            [
                'name' => 'SAMBA OG SHOES - Women White',
                'price' => 100.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/3f97a71da3ae4cb98250122966491184_9366/Samba_OG_Shoes_White_IG9030_00_plp_standard.jpg',
                'badge' => 'WOMENS ORIGINALS',
                'etalase' => $shoesEtalase,
                'description' => 'Women\'s white classic sneakers',
                'category' => 'shoes',
            ],
            [
                'name' => 'SAMBA LONG TONGUE SHOES',
                'price' => 120.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/1f525b85b19a4eda86742e0f46413bcf_9366/Samba_Long_Tongue_Shoes_White_JR5998_00_plp_standard.jpg',
                'badge' => 'WOMENS ORIGINALS',
                'etalase' => $shoesEtalase,
                'description' => 'Extended tongue design sneakers',
                'category' => 'shoes',
            ],
            [
                'name' => 'SAMBA OG SHOES - Women Black Premium',
                'price' => 100.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/89282cea6ef8495caff848b041a0a3ce_9366/Samba_OG_Shoes_Black_IE5836_00_plp_standard.jpg',
                'badge' => 'WOMENS ORIGINALS',
                'etalase' => $shoesEtalase,
                'description' => 'Premium black leather sneakers for women',
                'category' => 'shoes',
            ],
            [
                'name' => 'SAMBA OG SHOES - Silver',
                'price' => 100.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/b668a22ed8ee475e87beafeeedb96657_9366/Samba_OG_Shoes_Silver_JR0035_00_plp_standard.jpg',
                'badge' => 'WOMENS ORIGINALS',
                'etalase' => $shoesEtalase,
                'description' => 'Silver metallic finish sneakers',
                'category' => 'shoes',
            ],
            [
                'name' => 'SAMBA OG SHOES KIDS - White',
                'price' => 80.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/9fb258a11a25407ab06b52eed1cca37b_9366/Samba_OG_Shoes_Kids_White_IE3675_00_plp_standard.jpg',
                'badge' => 'ORIGINALS',
                'etalase' => $shoesEtalase,
                'description' => 'Kids size classic white sneakers',
                'category' => 'shoes',
            ],
            [
                'name' => 'SAMBA OG SHOES KIDS - White Small',
                'price' => 56.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/2c1a1838d62e4b23b8dddc26793bd47f_9366/Samba_OG_Shoes_Kids_White_JQ2843_00_plp_standard.jpg',
                'badge' => 'ORIGINALS',
                'etalase' => $shoesEtalase,
                'description' => 'Small kids white sneakers',
                'category' => 'shoes',
            ],
            [
                'name' => 'SAMBA OG COMFORT CLOSURE ELASTIC LACE SHOES KIDS',
                'price' => 39.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/e7e49fce7e54448da09a2983c4fa43d0_9366/Samba_OG_Comfort_Closure_Elastic_Lace_Shoes_Kids_White_JQ3190_00_plp_standard.jpg',
                'badge' => 'ORIGINALS',
                'etalase' => $shoesEtalase,
                'description' => 'Easy slip-on kids shoes with elastic laces',
                'category' => 'shoes',
            ],

            // ==========================
            // TAS (Bag)
            // ==========================
            [
                'name' => 'DEFENDER 5 SMALL DUFFEL BAG',
                'price' => 28.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/80690c33e4d348c58dae6b01ad83e760_9366/Defender_5_Small_Duffel_Bag_Black_JJ7410_00_plp_standard.jpg',
                'badge' => 'SPORTSWEAR',
                'etalase' => $bagEtalase,
                'description' => 'Compact duffel bag for gym and travel',
                'category' => 'bag',
            ],

            // ==========================
            // JERSEY
            // ==========================
            [
                'name' => 'AL NASR FC 25/26 HOME JERSEY KIDS',
                'price' => 75.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/27b6e3345f9a4d59a5357e0a4b8a6aa6_9366/Al_Nassr_FC_25-26_Home_Jersey_Kids_Yellow_JN7981_000_plp_model.jpg',
                'badge' => 'PERFORMANCE',
                'etalase' => $jerseyEtalase,
                'description' => 'Official Al Nassr FC home jersey for kids',
                'category' => 'jersey',
            ],
            [
                'name' => 'ARGENTINA 26 HOME MESSI KIDS JERSEY',
                'price' => 110.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/fc50a8f55f56430897757b1d9e2e3231_9366/Argentina_26_Home_Messi_Kids_Jersey_White_KA8115_000_plp_model.jpg',
                'badge' => 'PERFORMANCE',
                'etalase' => $jerseyEtalase,
                'description' => 'Argentina national team jersey with Messi print',
                'category' => 'jersey',
            ],
            [
                'name' => 'INTER MIAMI CF 25/26 MESSI AWAY JERSEY KIDS',
                'price' => 66.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/09518a69e074496ca06e33bf071d4386_9366/Inter_Miami_CF_25-26_Messi_Away_Jersey_Kids_Black_JI6820_000_plp_model.jpg',
                'badge' => 'PERFORMANCE',
                'etalase' => $jerseyEtalase,
                'description' => 'Inter Miami CF away jersey with Messi print',
                'category' => 'jersey',
            ],

            // ==========================
            // BOLA (Ball)
            // ==========================
            [
                'name' => 'FIFA WORLD CUP 26™ TRIONDA PRO BALL',
                'price' => 170.00,
                'image' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/4229e87f23044869a5218fbc64c4fd71_9366/FIFA_World_Cup_26tm_Trionda_Pro_Ball_White_JD8021_HM1.jpg',
                'badge' => 'PERFORMANCE',
                'etalase' => $ballEtalase,
                'description' => 'Official FIFA World Cup 2026 match ball',
                'category' => 'ball',
            ],
        ];

        $this->command->info('Creating ' . count($products) . ' products...');
        
        foreach ($products as $index => $productData) {
            $this->createProduct($productData, $sizes, $index + 1);
        }
        
        $this->command->info('Products created successfully!');
    }
    
    private function createProduct(array $data, $sizes, int $counter): void
    {
        // Buat slug unik
        $slug = Str::slug($data['name']) . '-' . Str::random(6);
        
        // Cek apakah slug sudah ada
        while (Product::where('slug', $slug)->exists()) {
            $slug = Str::slug($data['name']) . '-' . Str::random(6);
        }
        
        $this->command->line("[$counter] Creating: {$data['name']}");
        
        // Create product
        $product = Product::create([
            'etalase_id' => $data['etalase']->id,
            'name' => $data['name'],
            'slug' => $slug,
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $data['image'],
            'badge' => $data['badge'],
            'is_active' => true,
            'stock' => 0, // Akan diupdate setelah attach sizes
            'views' => rand(50, 500), // Random views
        ]);
        
        // Attach sizes berdasarkan kategori
        $totalStock = 0;
        
        if ($data['category'] === 'shoes') {
            $totalStock = $this->attachShoeSizes($product, $sizes);
        } elseif ($data['category'] === 'jersey') {
            $totalStock = $this->attachJerseySizes($product, $sizes);
        } elseif ($data['category'] === 'bag' || $data['category'] === 'ball') {
            // Untuk bag dan ball, gunakan size default atau tidak perlu size
            $defaultSize = $sizes->firstWhere('code', 'M') ?? $sizes->first();
            if ($defaultSize) {
                $stock = rand(10, 30);
                $product->sizes()->attach($defaultSize->id, [
                    'stock' => $stock,
                    'additional_price' => 0,
                ]);
                $totalStock = $stock;
            }
        }
        
        // Update total stock
        $product->update(['stock' => $totalStock]);
        
        $this->command->line("[$counter] ✓ Created: {$data['name']} (Stock: {$totalStock})");
    }
    
    private function attachShoeSizes(Product $product, $sizes): int
    {
        $totalStock = 0;
        
        foreach ($sizes as $size) {
            $stock = match($size->code) {
                'XS' => rand(0, 5),
                'S'  => rand(5, 15),
                'M'  => rand(15, 25), // Size M paling banyak stock
                'L'  => rand(10, 20),
                'XL' => rand(3, 10),
                'XXL'=> rand(0, 5),
                default => 0
            };
            
            if ($stock > 0) {
                $product->sizes()->attach($size->id, [
                    'stock' => $stock,
                    'additional_price' => $this->getAdditionalPrice($size->code),
                ]);
                $totalStock += $stock;
            }
        }
        
        return $totalStock;
    }
    
    private function attachJerseySizes(Product $product, $sizes): int
    {
        $totalStock = 0;
        
        // Jersey biasanya tersedia dalam size S, M, L, XL
        $jerseySizes = $sizes->whereIn('code', ['S', 'M', 'L', 'XL']);
        
        foreach ($jerseySizes as $size) {
            $stock = match($size->code) {
                'S'  => rand(8, 15),
                'M'  => rand(12, 20), // Size M paling banyak untuk jersey
                'L'  => rand(8, 15),
                'XL' => rand(5, 10),
                default => 0
            };
            
            if ($stock > 0) {
                $product->sizes()->attach($size->id, [
                    'stock' => $stock,
                    'additional_price' => 0,
                ]);
                $totalStock += $stock;
            }
        }
        
        return $totalStock;
    }
    
    private function getAdditionalPrice(string $sizeCode): float
    {
        // Size besar biasanya lebih mahal
        return match($sizeCode) {
            'XXL' => 5.00,
            'XL'  => 3.00,
            default => 0
        };
    }
}