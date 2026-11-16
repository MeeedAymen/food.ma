<?php

namespace Database\Seeders;

use App\Models\Discount;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@happyfood.test'],
            [
                'username' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'kitchen@happyfood.test'],
            [
                'username' => 'Kitchen Staff',
                'password' => Hash::make('password'),
                'role' => 'kitchenStaff',
                'email_verified_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'customer@happyfood.test'],
            [
                'username' => 'Customer',
                'password' => Hash::make('password'),
                'role' => 'customer',
                'email_verified_at' => now(),
            ]
        );

        $menus = [
            [
                'name' => 'Yakitori (2pcs)',
                'description' => 'Grilled chicken skewers with tare glaze',
                'price' => 12.90,
                'image' => '1649669761-Yakitori (2pcs).jpg',
                'size' => 'small',
                'type' => 'Appetizer',
                'estCost' => 4.50,
                'allergic' => 0,
                'vegetarian' => 0,
                'vegan' => 0,
            ],
            [
                'name' => 'Chicken Cheese Roll',
                'description' => 'Crispy chicken roll with melted cheese',
                'price' => 15.90,
                'image' => '1650377292-Chicken Cheese Roll.jpg',
                'size' => 'small',
                'type' => 'Appetizer',
                'estCost' => 5.20,
                'allergic' => 1,
                'vegetarian' => 0,
                'vegan' => 0,
            ],
            [
                'name' => 'Nori Tama Nigiri',
                'description' => 'Egg nigiri wrapped with nori',
                'price' => 9.90,
                'image' => '1648796754-Nori Tama Nigiri.jpg',
                'size' => 'small',
                'type' => 'Sushi',
                'estCost' => 3.10,
                'allergic' => 1,
                'vegetarian' => 1,
                'vegan' => 0,
            ],
            [
                'name' => 'California Maki',
                'description' => 'Crab stick, avocado and cucumber roll',
                'price' => 18.90,
                'image' => '1648797333-California Maki.jpg',
                'size' => 'large',
                'type' => 'Sushi',
                'estCost' => 6.40,
                'allergic' => 1,
                'vegetarian' => 0,
                'vegan' => 0,
            ],
            [
                'name' => 'Spicy Aburi Salmon',
                'description' => 'Flame-seared spicy salmon sushi',
                'price' => 22.90,
                'image' => '1648797211-Spicy Aburi Salmon.png',
                'size' => 'large',
                'type' => 'Sushi',
                'estCost' => 8.50,
                'allergic' => 1,
                'vegetarian' => 0,
                'vegan' => 0,
            ],
            [
                'name' => 'Unagi Nigiri',
                'description' => 'Grilled eel nigiri with sweet sauce',
                'price' => 14.90,
                'image' => '1649687040-Unagi Nigiri.jpg',
                'size' => 'small',
                'type' => 'Sushi',
                'estCost' => 5.80,
                'allergic' => 1,
                'vegetarian' => 0,
                'vegan' => 0,
            ],
            [
                'name' => 'Hotate Nigiri',
                'description' => 'Fresh scallop nigiri',
                'price' => 16.90,
                'image' => '1649687496-Hotate Nigiri.jpg',
                'size' => 'small',
                'type' => 'Sushi',
                'estCost' => 6.20,
                'allergic' => 1,
                'vegetarian' => 0,
                'vegan' => 0,
            ],
            [
                'name' => 'Sushi Platter',
                'description' => 'Assorted chef selection sushi platter',
                'price' => 49.90,
                'image' => '1649671049-Sushi Platter.jpg',
                'size' => 'large',
                'type' => 'Sushi',
                'estCost' => 18.00,
                'allergic' => 1,
                'vegetarian' => 0,
                'vegan' => 0,
            ],
            [
                'name' => 'Soft Shell Crab Temaki',
                'description' => 'Hand roll with crispy soft shell crab',
                'price' => 17.90,
                'image' => '1648882100-Soft Shell Crab Temaki.jpg',
                'size' => 'large',
                'type' => 'Temaki',
                'estCost' => 7.10,
                'allergic' => 1,
                'vegetarian' => 0,
                'vegan' => 0,
            ],
            [
                'name' => 'California Temaki',
                'description' => 'California-style hand roll',
                'price' => 14.90,
                'image' => '1648882669-California Temaki.jpg',
                'size' => 'large',
                'type' => 'Temaki',
                'estCost' => 5.50,
                'allergic' => 1,
                'vegetarian' => 0,
                'vegan' => 0,
            ],
            [
                'name' => 'Yakiniku Ebi Fry Bento',
                'description' => 'Grilled beef and fried prawn bento set',
                'price' => 32.90,
                'image' => '1648881764-Yakiniku Ebi Fry Bento.jpg',
                'size' => 'large',
                'type' => 'Bento',
                'estCost' => 12.50,
                'allergic' => 1,
                'vegetarian' => 0,
                'vegan' => 0,
            ],
            [
                'name' => 'Salmon Steak & Ebi Fry Bento',
                'description' => 'Salmon steak with fried prawn bento',
                'price' => 34.90,
                'image' => '1648881863-Salmon Steak & Ebi Fry Bento.jpg',
                'size' => 'large',
                'type' => 'Bento',
                'estCost' => 13.20,
                'allergic' => 1,
                'vegetarian' => 0,
                'vegan' => 0,
            ],
            [
                'name' => 'Tokyo Ramen Noodles',
                'description' => 'Classic Tokyo-style ramen broth',
                'price' => 24.90,
                'image' => '1648881968-Tokyo Ramen Noodles.jpg',
                'size' => 'large',
                'type' => 'Ramen',
                'estCost' => 8.90,
                'allergic' => 1,
                'vegetarian' => 0,
                'vegan' => 0,
            ],
            [
                'name' => 'Yakibuta Ramen Noodles',
                'description' => 'Ramen topped with roasted pork',
                'price' => 26.90,
                'image' => '1649668226-Yakibuta Ramen Noodles.jpg',
                'size' => 'large',
                'type' => 'Ramen',
                'estCost' => 9.80,
                'allergic' => 1,
                'vegetarian' => 0,
                'vegan' => 0,
            ],
            [
                'name' => 'Beef Nabeyaki Udon',
                'description' => 'Hot pot udon with beef and vegetables',
                'price' => 27.90,
                'image' => '1648882023-Beef Nabeyaki Udon.jpg',
                'size' => 'large',
                'type' => 'Ramen',
                'estCost' => 10.20,
                'allergic' => 1,
                'vegetarian' => 0,
                'vegan' => 0,
            ],
            [
                'name' => 'Green Tea (Hot or Iced)',
                'description' => 'Japanese green tea, hot or iced',
                'price' => 6.90,
                'image' => '1648881567-Green Tea (Hot or Iced).jpg',
                'size' => 'small',
                'type' => 'Beverage',
                'estCost' => 1.50,
                'allergic' => 0,
                'vegetarian' => 1,
                'vegan' => 1,
            ],
            [
                'name' => 'Matcha Smoothie',
                'description' => 'Creamy matcha blended smoothie',
                'price' => 12.90,
                'image' => '1649671926-Matcha Smoothie.jpg',
                'size' => 'large',
                'type' => 'Beverage',
                'estCost' => 3.80,
                'allergic' => 1,
                'vegetarian' => 1,
                'vegan' => 0,
            ],
            [
                'name' => 'Vanilla Ice Cream Doughnut',
                'description' => 'Doughnut topped with vanilla ice cream',
                'price' => 11.90,
                'image' => '1648881059-Vanilla Ice Cream Doughnut.jpg',
                'size' => 'small',
                'type' => 'Dessert',
                'estCost' => 3.40,
                'allergic' => 1,
                'vegetarian' => 1,
                'vegan' => 0,
            ],
            [
                'name' => 'Matcha Ice-Cream',
                'description' => 'Premium matcha ice cream',
                'price' => 9.90,
                'image' => '1648881133-Matcha Ice-Cream.jpg',
                'size' => 'small',
                'type' => 'Dessert',
                'estCost' => 2.90,
                'allergic' => 1,
                'vegetarian' => 1,
                'vegan' => 0,
            ],
            [
                'name' => 'Strawberry Daifuku (2pcs)',
                'description' => 'Soft mochi filled with strawberry',
                'price' => 10.90,
                'image' => '1649669195-Strawberry Daifuku (2pcs).jpg',
                'size' => 'small',
                'type' => 'Dessert',
                'estCost' => 3.20,
                'allergic' => 0,
                'vegetarian' => 1,
                'vegan' => 1,
            ],
        ];

        foreach ($menus as $menu) {
            Menu::updateOrCreate(
                ['name' => $menu['name']],
                $menu
            );
        }

        Discount::updateOrCreate(
            ['discountCode' => 'WELCOME10'],
            [
                'percentage' => 10,
                'minSpend' => 30.00,
                'cap' => 15.00,
                'startDate' => now()->toDateString(),
                'endDate' => now()->addMonths(6)->toDateString(),
                'description' => '10% off orders over 30',
            ]
        );
    }
}
