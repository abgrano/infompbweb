<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert(
            array(
                array("code" => "90411190", "name" => "GREEN PEPPER", "slug" => Str::of('GREEN PEPPER')->slug("-")),
                array("code" => "90411200", "name" => "WHITE PEPPER, NEITHER CRUSHED NOR GROUND", "slug" => Str::of('WHITE PEPPER, NEITHER CRUSHED NOR GROUND')->slug("-")),
                array("code" => "90411300", "name" => "BLACK PEPPER, NEITHER CRUSHED NOR GROUND", "slug" => Str::of('BLACK PEPPER, NEITHER CRUSHED NOR GROUND')->slug("-")),
                array("code" => "90412090", "name" => "OTHER PEPPER, CRUSHED OR GROUND", "slug" => Str::of('OTHER PEPPER, CRUSHED OR GROUND')->slug("-")),
                array("code" => "90412100", "name" => "WHITE PEPPER, CRUSHED OR GROUND", "slug" => Str::of('WHITE PEPPER, CRUSHED OR GROUND')->slug("-")),
                array("code" => "90412200", "name" => "BLACK PEPPER, CRUSHED OR GROUND", "slug" => Str::of('BLACK PEPPER, CRUSHED OR GROUND')->slug("-")),
                array("code" => "90420000", "name" => "CAPSICUM, DRIED OR CRUSHED OR GROUND", "slug" => Str::of('CAPSICUM, DRIED OR CRUSHED OR GROUND')->slug("-")),
                array("code" => "90500000", "name" => "VANILLA", "slug" => Str::of('VANILLA')->slug("-")),
                array("code" => "90610000", "name" => "CINNAMON, NEITHER CRUSHED NOR GROUND", "slug" => Str::of('CINNAMON, NEITHER CRUSHED NOR GROUND')->slug("-")),
                array("code" => "90620000", "name" => "CINNAMON, CRUSHED OR GROUND", "slug" => Str::of('CINNAMON, CRUSHED OR GROUND')->slug("-")),
                array("code" => "90700000", "name" => "CLOVES", "slug" => Str::of('CLOVES')->slug("-")),
                array("code" => "90810000", "name" => "NUTMEG", "slug" => Str::of('NUTMEG')->slug("-")),
                array("code" => "90820000", "name" => "MACE", "slug" => Str::of('MACE')->slug("-")),
                array("code" => "90830000", "name" => "CARDAMOMS", "slug" => Str::of('CARDAMOMS')->slug("-")),
                array("code" => "90910000", "name" => "SEEDS OF ANISE OR BADIAN", "slug" => Str::of('SEEDS OF ANISE OR BADIAN')->slug("-")),
                array("code" => "90920000", "name" => "SEEDS OF CORIANDER", "slug" => Str::of('SEEDS OF CORIANDER')->slug("-")),
                array("code" => "90930000", "name" => "SEEDS OF CUMIN", "slug" => Str::of('SEEDS OF CUMIN')->slug("-")),
                array("code" => "90940000", "name" => "SEEDS OF CARAWAY", "slug" => Str::of('SEEDS OF CARAWAY')->slug("-")),
                array("code" => "90950000", "name" => "SEEDS OF FENNEL, JUNIPER, BERRIES", "slug" => Str::of('SEEDS OF FENNEL, JUNIPER, BERRIES')->slug("-")),
                array("code" => "91010000", "name" => "GINGER", "slug" => Str::of('GINGER')->slug("-")),
                array("code" => "91020000", "name" => "SAFFRON", "slug" => Str::of('SAFFRON')->slug("-")),
                array("code" => "91030000", "name" => "TUMERIC (CURCUMA)", "slug" => Str::of('TUMERIC (CURCUMA)')->slug("-")),
                array("code" => "91040000", "name" => "THYME BAY LEAVES", "slug" => Str::of('THYME BAY LEAVES')->slug("-")),
                array("code" => "91099200", "name" => "CURRY SPICES", "slug" => Str::of('CURRY SPICES')->slug("-")),
                array("code" => "91091000", "name" => "MIXTURE OF OTHER SPICES", "slug" => Str::of('MIXTURE OF OTHER SPICES')->slug("-")),
                array("code" => "91099000", "name" => "OTHER SPICES", "slug" => Str::of('OTHER SPICES')->slug("-")),
                array("code" => "09421100", "name" => "CHILLIES", "slug" => Str::of('CHILLIES')->slug("-"))
            )
        );
    }
}
