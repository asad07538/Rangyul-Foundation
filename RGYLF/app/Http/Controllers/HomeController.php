<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Donar;
use App\Models\NeedyPerson;
use App\Models\AccCostCenter;
use App\Models\AccEntry;


class HomeController extends Controller
{
    //
    public function index(){

        return view('welcome');
    }

    public function dashboard(){
        $no_of_donar=count(Donar::all());
        $no_of_needy_ones=count(NeedyPerson::all());

        $sectors=AccCostCenter::all();
        $labels=[];
        $cr_values=[];
        $dr_values=[];

        foreach($sectors as $sector){
            $labels[]=$sector->name;
            $cr_total=0;
            $dr_total=0;
            foreach($sector->entries as $entry){
                $cr_total+=$entry->cr_total;
                $dr_total+=$entry->dr_total; 
            }
            $cr_values[]= $cr_total;
            $dr_values[]= $dr_total;
        }
        $creditDebitSectors = app()->chartjs
            ->name('lineChartTest')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels($labels)
            ->datasets([
                [
                    "label" => "Credit",
                    'backgroundColor' => "rgb(" .rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255). ",0.31)",
                    'borderColor' => "rgb(" .rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255). ")",
                    "pointBorderColor" => "rgb(" .rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255). ")",
                    "pointBackgroundColor" => "rgb(" .rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255). ")",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgb(" .rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255). ")",
                    'data' => $cr_values,
                ],
                [
                    "label" => "Debit",
                    'backgroundColor' => "rgb(" .rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255). ",0.31",
                    'borderColor' => "rgb(" .rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255). ")",
                    "pointBorderColor" => "rgb(" .rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255). ")",
                    "pointBackgroundColor" => "rgb(" .rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255). ")",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $dr_values,
                ]
            ])
        ->options([]);

        $no_of_donar_and_beneficiaries = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Donars', 'Beneficiaries'])
            ->datasets([
                [
                    'backgroundColor' => ["rgb(" .rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255). ")", "rgb(" .rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255). ")"],
                    'hoverBackgroundColor' => ["rgb(" .rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255). ")", "rgb(" .rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255). ")"],
                    'data' =>[$no_of_donar , $no_of_needy_ones ]
                ]
            ])
        ->options([]);
    

        $males=count(NeedyPerson::where('gender','Male')->get());
        $females=count(NeedyPerson::where('gender','Female')->get());
        $male_female_beneficiaries = app()->chartjs
            ->name('male_female_beneficiaries')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Males', 'Females'])
            ->datasets([
                [
                    'backgroundColor' => ["rgb(" .rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255). ")", "rgb(" .rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255). ")"],
                    'hoverBackgroundColor' => ["rgb(" .rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255). ")", "rgb(" .rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255). ")"],
                    'data' =>[ $males , $females ]
                ]
            ])
        ->options([]);

        $donations=AccEntry::where('custom_type','fund_collection')->get()->sum("cr_total");
        $disbursements=AccEntry::where('custom_type','fund_disbursment')->get()->sum("cr_total");
        $recoveries=AccEntry::where('custom_type','fund_recoveries')->get()->sum("cr_total");
        $expenses=AccEntry::where('custom_type','expenses')->get()->sum("cr_total");


        return view('dashboard',
                    compact('no_of_donar_and_beneficiaries',
                            'creditDebitSectors',
                            'donations',
                            'disbursements',
                            'recoveries',
                            'expenses',
                            'male_female_beneficiaries',
                            'no_of_donar' ,
                            'no_of_needy_ones',
                            'males',
                            'females',
                            'labels',
                            'cr_values',
                            'dr_values',
                        ));
    }
}
