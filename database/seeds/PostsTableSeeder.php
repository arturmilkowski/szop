<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('posts')->insert(
            [
                // 'user_id' => '6abd1059-b051-4ce1-af5e-799cc38d0ff1',
                'slug' => 'witam-na-mojej-stronie',
                'title' => 'witam na mojej stronie',
                'intro' => 'po dziewięciu latach tworzenia zapachów dla siebie i znajomych, zdecydowałem się zaprezentować je szerzej.',
                'content' => '<p>robię wszystko sam.<br>
                    sam "zaprojektowałem" etykiety i znak graficzny.<br>
                    piszę w cudzysłowie, bo graficy pytali by gdzie tu jest jakaś grafika.<br>
                    kod sklepu internetowego także pisałem sam.<br>
                    wreszcie, zapachy również mieszam samodzielnie.<br>
                    z pojedynczych składników, w głównej mierze, naturalnych.<br>
                    są to wysokiej jakości esencje, absoluty, olejki i molekuły.<br>
                    nie zatrudniam grafików, programistów (ci potrafią oskubać z ostatniego grosza) ani speców od reklamy.<br>
                    <strong>dlatego nabywca, płaci jedynie za produkt, nie za całą otoczkę.</strong></p>
                    <p>staram się dbać o planetę.<br>
                    unikam plastiku, folii i szkodliwych substancji.<br>
                    zachęcam do ponownego wykorzystania butelek po zapachach.<br>
                    na przykład jako odświeżacze powietrza lub zraszacze do kwiatów<br>
                    </p>
                    <p><strong>mam nadzieję, że będziesz miał tyle samo satysfakcji z noszenia zapachów, co ja z ich tworzenia.</strong></p>',
                'img' => 'witam-na-mojej-stronie.webp',
                'site_description' => 'witam na mojej stronie. zapraszam do zapoznania się z wpisami na blogu i produktami',
                'site_keyword' => 'tworzenie perfum, tworzenie zapachów, ręcznie tworzone zapachy, polska woda kolońska, woda kolońska nowa sól',
                'approved' => '1',
                'published' => '1',
                'created_at' => '2020-06-03 22:06:03.000000',
            ]
        );
        DB::table('posts')->insert(
            [
                // 'user_id' => '6abd1059-b051-4ce1-af5e-799cc38d0ff1',
                'slug' => 'czy-woda-kolonska-jest-tylko-dla-panow',
                'title' => 'czy woda kolońska jest tylko dla panów?',
                'intro' => 'czasami można usłyszeć pytanie, woda kolońska dla kobiet? przecież to domena mężczyzn.<br>otóż nie. pierwsze wody kolońskie były przeznaczone dla obydwu płci.<br>dopiero z czasem przyszło rozróżnienie, na damskie i męskie.',
                'content' => '<p>
                pojęcie <i>woda kolońska</i> można rozpatrywać w dwóch kategoriach.<br>
                <strong>jako rodzina zapachów lekkich</strong>, świeżych, opartych o bergamotę, cytrynę, pomarańczę, lawendę, rozmaryn i neroli.<br>
                i <strong>jako koncentrację zapachu</strong>. woda kolońska ma mniejszą koncentrację substancji zapachowych niż woda toaletowa czy perfumowana.
                </p>
                <p>
                podział ze względu na stężenie substancji zapachowych, rosnąco:<br>
                &mdash; woda po goleniu (after shave / après-rasage),<br>
                &mdash; mgiełka do ciała (eau fraîche),<br>
                &mdash; woda kolońska (eau de cologne),<br>
                &mdash; woda toaletowa (eau de toilette),<br>
                &mdash; woda perfumowana (eau de parfume),<br>
                &mdash; perfumy toaletowe (parfum de toilette),<br>
                &mdash; perfumy (parfum),<br>
                &mdash; ekstrakt perfum (esxtrait de parfum)<br>
                </p>
                <p>
                nie jestem pewien czy warto podawać stężenia, bo producenci i tak się ich nie trzymają.
                </p>
                <p>
                od kilku lat panuje renesans na wody kolońskie.<br>
                ciekawym zabiegiem, stosowanym przez producentów perfum, jest wypuszczanie znanego zapachu, z dopiskiem <i>cologne</i>.<br>
                najczęściej jest to woda toaletowa, lecz świeższa i lżejsza niż wcześniej produkowana, pod tą samą nazwą.<br>
                niech za przykład posłuży dior &mdash; fahrenheit cologne.
                </p>
                <p>
                amerykanie nie przejmują się tradycyjnym, francuskim podejścim i na wszystkie zapachy mówią <i>cologne</i>.
                </p>',
                'img' => 'czy-woda-kolonska-jest-tylko-dla-panow.webp',
                'site_description' => 'woda kolońska dla kobiet? przecież to domena mężczyzn. otóż nie. pierwsze wody kolońskie były przeznaczone dla obydwu płci.',
                'site_keyword' => 'woda kolońska, woda toaletowa, woda kolońska damska, damska woda kolońska, woda kolońska a woda toaletowa, cologne',
                'approved' => '1',
                'published' => '1',
                'created_at' => '2020-06-07 20:20:02.000000',
            ]
        );
        DB::table('posts')->insert(
            [

                'slug' => 'napisali-o-mnie',
                'title' => 'napisali o mnie',
                'intro' => 'przyjemnie się pochwalić, że kilka osób zechciało kiedyś napisać lub powiedzieć kilka słów o moich zapachach',
                'content' => '<p>
                    blog <a href="https://perfumomania.wordpress.com/" title="perfumomania">perfumomania</a> (subiektywnie i ze szpileczką o perfumach…). rok 2012.
                    <br>
                    zapachy: 
                    <br>
                    &mdash; <a href="https://perfumomania.wordpress.com/2012/04/22/smola-by-aleksander-czyli-paczula-z-sercem-na-dloni/" title="smoła">smoła</a>
                    <br>
                    &mdash; <a href="https://perfumomania.wordpress.com/2012/09/11/vet-vet-vet-i-lament-by-aleksander-czyli-nieskalanej-komercha-niszy-ciag-dalszy/" title="vet vet vet">vet vet vet</a>
                    </p>
                    <p>                    
                    kanał na youtube <a href="https://www.youtube.com/channel/UCCmND5rWWQ6hI7kqmptw44w" title="ogród perfum agaty">ogród perfum agaty</a>. rok 2017.<br>
                    &mdash; <a href="https://www.youtube.com/watch?v=lFUP0iAYy0w" title="kilka zapachów">kilka zapachów.</a> lawenda na marsie. rozewie. pozycja lotosu
                    </p>
                    <p>                    
                    blog <a href="https://belorek.wordpress.com/" title="pachnący blog belora">pachnący blog belora</a>. rok 2019.<br>
                    &mdash; <a href="https://belorek.wordpress.com/2018/08/02/przyprawa/" title="przyprawa">przyprawa</a>
                    <br>
                    &mdash; <a href="https://belorek.wordpress.com/2018/06/03/depresja-w-amsterdamie/" title="depresja w amsterdamie">depresja w amsterdamie</a>
                    </p>
                    <p>na forum perfumeryjnym <a href="https://perfuforum.pl/" title="perfuforum">perfuforum</a> podpisuję się jako aleksander więc stąd w tekstach to imię.</p>',
                'img' => 'napisali-o-mnie.webp',
                'site_description' => 'recenzje moich zapachów',
                'site_keyword' => 'depresja w amsterdamie, pozycja lotosu, lawenda na marsie, rozewie, przyprawa, smoła, perfumomania, ogród perfum agaty, pachnący blog belora, perfuforum',
                'approved' => '1',
                'published' => '1',
                'created_at' => '2020-06-11 18:11:11.000000',
            ]
        );
        DB::table('posts')->insert(
            [
                // 'user_id' => '6abd1059-b051-4ce1-af5e-799cc38d0ff1',
                'slug' => 'facelia-lubuska-lawenda',
                'title' => 'facelia - lubuska lawenda',
                'intro' => 'facelia błękitna pochodzi z kalifornii. uprawiana głównie ze względu na miód. z pewnej odległości przypomina kolorem lawendę.',
                'content' => '<p><img src="https://woda-kolonska.pl/storage/img/posts/facelia.webp" class="img-fluid" title="facelia"/></p>
                    miejscowość gronowo.
                    <br> 
                    <small>               
                    fotografia na górze zrobiona przez <a href="https://www.facebook.com/przemek.mielczarek.54" title="">przemka mielczarka</a>.
                    <br>
                    dolna przez <a href="https://mariusznawrocki.pl/" title="">mariusza nawrockiego</a>.
                    </small>',
                'img' => 'facelia-lubuska-lawenda.webp',
                'site_description' => 'facelia - lubuska lawenda',
                'site_keyword' => 'facelia błękitna, gronowo, przemek mielczarek, mariusz nawrocki',
                'approved' => '1',
                'published' => '1',
                'created_at' => '2020-06-18 16:18:18.000000',
            ]
        );
        /*
        DB::table('posts')->insert(
            [
                // 'user_id' => '6abd1059-b051-4ce1-af5e-799cc38d0ff1',
                'slug' => '',
                'title' => '',
                'intro' => '',
                'content' => '',
                'img' => '',
                'site_description' => '',
                'site_keyword' => '',
                'approved' => '1',
                'published' => '1',
                'created_at' => '2020-06-07 20:20:02.000000',
            ]
        );
        */
    }
}
