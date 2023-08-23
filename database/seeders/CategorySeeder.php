<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['مضاف خرسانه', 'مادة ربط' ,'مادة لصق البلاط','مادة تسقية السراميك','مونة جاهزة للترميم' ,'قراوت اسمنتي' ,'مادة تزريع' 
    ,'دهان اسمنتي' ,'دهان بتومين' ,'مصلد ارضيات','ايبوكسي' ,'قاطع مياه','مادة حشو الفواصل' ,'بولثلين شين' ,'الياف'];

        foreach ($categories as $category) {
            $new_category = new Category();
            $new_category->name = $category;
            $new_category->save();
        }
    }
}
