<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert(
            [
                'brand_id' => 1,
                'category_id' => 2,
                'concentration_id' => 1,
                'slug' => 'lawenda-dla-panow',
                'name' => 'lawenda dla panów',
                'description' => 'lavare po łacinie, włosku i hiszpańsku znaczy myć, czyścić i prać.
                silny zapach lawendy, w połączeniu z aksamitną wanilią tworzą niepowtarzalną, męską aurę. naturalna, niefrakcjonowana lawenda, w której można odnaleźć chłód lasu i zapach łąki. delikatna i mleczna wanilia, z akcentami tytoniu i skóry. drewno sandałowe, z niewielkim dodatkiem pikantnego cynamonu. lawenda, wanilia, sandał jak i cynamon, występujące w składzie, są naturalne.
                <br>
                <div><strong>początek:</strong> lawenda. <strong>środek:</strong> wanilia. <strong>koniec:</strong> drewno sandałowe, cynamon, piżmo</div>
                ', /*'w 1934 roku ernest daltroff skomponował pierwszą wodę toaletową przeznaczoną tylko dla mężczyzn &mdash; caron &mdash; pour un homme.
                        <br>
                        rewolucyjne, jak na tamte czasy, połączenie lawendy i wanilii, w praktycznie niezmienionej wersji, przetrwało do dzisiaj.
                        <br>
                        woda ta wywarła na mnie na tyle silne wrażenie, że postanowiłem stworzyć zapach oparty na tym samym koncepcie, ale bardziej szlachetny i z wysokiej jakości składników.
                        <br>
                        użyłem naturalnej, niefrakcjonowanej lawendy, która w mojej opinii, jest doskonalsza niż modyfikowana czy całkowicie syntetyczna.
                        <br>
                        w lawendzie odnajduję chłód lasu, zapach łąki i ustawionymi na niej ulami.
                        <br>
                        kontrapunktem dla gorzkiej, ziołowej lawendy, jest wanilia.
                        <br>
                        delikatna i mleczna, z akcentami tytoniu i skóry.
                        <br>
                        dopełnienie stanowi drewno sandałowe, minimalnie przyprószone gorącym i pikantnym cynamonem.
                        <br>
                        lawenda, wanilia, sandał jak i cynamon, występujące w składzie, są naturalne.
                        <br>
                        <div><strong>początek:</strong> lawenda. <strong>środek:</strong> wanilia. <strong>koniec:</strong> drewno sandałowe, cynamon, piżmo</div>',*/
                'img' => 'lawenda-dla-panow.jpg',
                'site_description' => 'lawendowa woda kolońska dla mężczyzn',
                'site_keyword' => 'lawendowa woda kolońska, polska woda kolońska, klasyczna woda kolońska, naturalna woda kolońska, lawenda, Ernest Daltroff, Caron Pour Un Homme',
            ]
        );
        DB::table('products')->insert(
            [
                'brand_id' => 1,
                'category_id' => 2,
                'concentration_id' => 1,
                'slug' => 'bergamota-dla-panow',
                'name' => 'bergamota dla panów',
                'description' => 'Donec a felis in est pellentesque fringilla. Donec erat metus, efficitur a justo in, condimentum vehicula est. Pellentesque lobortis nunc et mauris aliquet, non semper dolor malesuada. Morbi congue mi tempus erat malesuada, quis cursus urna vehicula. Sed vehicula vehicula elit in convallis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed porta, lorem quis consectetur commodo, nisl turpis euismod lorem, non consectetur nulla erat eu nisi.',
                'img' => 'bergamota-dla-panow.jpg',
                'site_description' => 'woda kolońska o zapachu bergamotki',
                'site_keyword' => 'bergamotka, bergamota, bergamotowa woda kolońska',
            ]
        );
    }
}
