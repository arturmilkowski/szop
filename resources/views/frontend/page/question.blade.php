@extends('frontend.layouts.app')

@section('title', 'pytania i odpowiedzi')
@section('description', 'najczęściej zadawane pytania i odpowiedzi na nie')
@section('keywords', 'woda kolońska, naturalna woda kolońska, ręcznie tworzona woda kolońska, woda toaletowa, naturalna woda toaletowa, ręcznie tworzona woda toaletowa')

@section('content')
            <div class="row mt-5 mb-3"><div class="col-sm"><h1>pytania i odpowiedzi</h1></div></div>
            <div class="row">
                <div class="col-sm">
                    <div class="accordion" id="accordionExample">

                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        dlaczego wody kolońskie a nie toaletowe?
                                    </button>
                                </h2>
                            </div>                      
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    w rzeczywistości moje zapachy mają koncentrację wód toaletowych. jednak z tego względu, że naturalne składniki,
                                    nie pachną tak mocno i długo jak syntetyczne, wolę określać je jako wody kolońskie. wody toaletowe mają u mnie stężenie wód perfumowanych.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        dlaczego zapach nie jest tylko i wyłącznie z naturalnych składników?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    moja woda kolońska złożona jest w 95% z naturalnych składników. te 5% to piżmo, które utrwala zapach i substancje zwiększające projekcję. syntetyczne składniki stawiają dopełnienie. bez nich, produkt mógłby się obejść, ale miałby trochę gorsze parametry.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        czy naturalne zapachy są słabsze niż syntetyczne?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    można powiedzieć, że są słabsze. nie pachną tak długo ani mocno jak syntetyczne, ale za to mają przyjemniejsze brzmienie.
                                    oczywiście są odstępstwa. na przykład geranium, paczula czy goździk, pachną tak samo mocno i długo jak aromamolekuły.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        jak długo mogę przechowywać zapach po pierwszym użyciu?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                <div class="card-body">
                                    dobrze jest zużyć zapach do dwóch lat po pierwszym użyciu. jednakże dłuższe przechowywanie nie powinno mieć wpływu na jego jakość.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        czy to normalne, że płyn nie jest idealnie przezroczysty?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                <div class="card-body">
                                    dla wód złożonych z naturalnych składników, zmętnienie jest zupełnie naturalne. mogą wytrącać się osady i drobne cząstki. nie ma to jednak wpływu na sam zapach.
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="card">
                            <div class="card-header" id="headingSix">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                        -->
                    </div>
                </div>
            </div>
@endsection
