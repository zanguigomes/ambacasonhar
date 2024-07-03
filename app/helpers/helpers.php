<?php

use App\Models\Organism;
use App\Models\Setting;

//Show settings items
if (!function_exists('settings')) {

    function settings()
    {

        $settings = Setting::all();

        foreach ($settings as $item) {

            $sett = $item;
        }

        return $sett;
    }
}

//Show secretaries list in the menu
if (!function_exists('show_menu_items')) {

    function showEntitiesMenuItem(){

        $entities = Organism::where('active', true)
        ->where('type','!=','Serviço')
        ->limit(8)
        ->get();

        foreach($entities as $item){

           echo '<li><a href="/entidade/'. $item->slug .'" class="nav-link">' . $item->title . '</a></li>';
        }

    }

    function showServicesMenuItem(){

        $services = Organism::where('active', true)
        ->where('type','Serviço')
        ->limit(8)
        ->get();

        foreach($services as $item){

           echo '<li><a href="/servico/'. $item->slug .'" class="nav-link">' . $item->title . '</a></li>';
        }

    }

    function alertaFestasAmbaca(){

        $alert = Setting::get();

            foreach($alert as $alt){

                if($alt->alerta_aniv != 0){
                    echo '
                        <section class="count_down_script alert alert-warning alert-dismissible fade show" role="alert">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div id="headline"><i class="fa-regular fa-bell"></i>&nbsp;&nbsp;Ambaca <span id="numberYears"></span> anos&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;Faltam</div>
                                    <div id="countdown">

                                        <span class="item"><span id="days"></span> dias</span>,
                                        <span class="item"><span id="hours"></span> Horas</span>,
                                        <span class="item"><span id="minutes"></span> Minutos</span> e
                                        <span class="item"><span id="seconds"></span> Segundos</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </section>
                    ';
                }

            }

    }
}


