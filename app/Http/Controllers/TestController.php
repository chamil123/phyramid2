<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\partner;
use App\dummey;

class TestController extends Controller {

    public function show() {
        $tot_pv = 0;
        $temp = 0;
        $temp_right = 0;
        $tot = 0;
        $order_products = User::select(\DB::raw('users.id,users.user_nic,users.name, SUM(dummey_pvs.pv) as PV_value,dummeys.dummey_name,dummeys.id as dummey_id,dummeys.bind_id,dummeys.daily_pv_tot,dummeys.side'))
                        ->join('dummeys', 'dummeys.user_id', '=', 'users.id')
                        ->leftJoin('dummey_pvs', 'dummey_pvs.dummey_id', '=', 'dummeys.id')
                        ->groupBy('dummeys.id')
                        ->orderBy('dummeys.id', 'desc')->get();

        foreach ($order_products as $order_product) {
            $partners = DB::table('partners')
                    ->join('users', 'partners.user_id', '=', 'users.id')
                    ->join('dummeys', 'users.id', '=', 'dummeys.user_id')
                    ->select('partners.*', 'dummeys.id', 'dummeys.daily_pv_tot', 'partners.nic_dummey as dummey_id')
                    ->where([
                        ['partners.user_id', $order_product->id],
                        ['dummeys.bind_id', 0],
                    ])
                    ->get();

            if ($order_product->side === "Left") {

                $center_pv_value = 0;
                $current_pv = 0;
                $centerPvTots = DB::table('partners')
                        ->join('users', 'partners.user_id', '=', 'users.id')
                        ->join('dummeys', 'users.id', '=', 'dummeys.user_id')
                        ->select('partners.*', 'dummeys.id', 'dummeys.daily_pv_tot', 'partners.nic_dummey as dummey_id')
                        ->where([
                            ['partners.user_id', $order_product->dummey_id],
                            ['dummeys.bind_id', 0],
                        ])
                        ->get();
                foreach ($centerPvTots as $centerPvTot) {
                    $center_pv_value = $centerPvTot->daily_pv_tot;
                    // print_r("Left ||| " . $order_product->dummey_id);
                }
                $current_pv = $order_product->PV_value;
                print_r($order_product . "  >>> " . "sssss " . ($temp + $current_pv + $center_pv_value) . "<br/>");
                $temp += $order_product->PV_value;

                $dummey = dummey::find($order_product->dummey_id);
                $dummey->daily_pv_tot = ($temp + $center_pv_value);
                $dummey->save();

                $current_pv = 0;
                $center_pv_value = 0;
            }
            if ($order_product->side === "Right") {
                $temp_right = 0;
                // print_r("Right ||| " . $order_product->dummey_id);

                $center_pv_value_r = 0;
                $centerPvTots_rights = DB::table('partners')
                        ->join('users', 'partners.user_id', '=', 'users.id')
                        ->join('dummeys', 'users.id', '=', 'dummeys.user_id')
                        ->select('partners.*', 'dummeys.id', 'dummeys.daily_pv_tot', 'partners.nic_dummey as dummey_id')
                        ->where([
                            ['partners.user_id', $order_product->dummey_id],
                            ['dummeys.bind_id', 0],
                        ])
                        ->get();
                foreach ($centerPvTots_rights as $centerPvTots_right) {
                    //; print_r("Right ||| " . $order_product->dummey_id);
                    $center_pv_value_r = $centerPvTots_right->daily_pv_tot;
                }

                $current_pv_right = $order_product->PV_value;
                print_r($order_product . "  >>> " . "vvvv " . ($temp_right + $center_pv_value_r + $current_pv_right) . "<br/>");
                $temp_right += $order_product->PV_value;

                $dummey = dummey::find($order_product->dummey_id);
                $dummey->daily_pv_tot = ($temp_right);
                $dummey->save();
                $center_pv_value = 0;
                // $temp_right=0;
            }
            if ($order_product->side === "Center") {

                foreach ($partners as $partner) {
//                      print_r($partners."<br/>");

                    $temp+=$order_product->PV_value;

                    if ($order_product->dummey_id === $partner->id) {


//                        $dummey = dummey::find($order_product->dummey_id);
//                       
//                        $dummey->daily_pv_tot = ($temp + $temp_right);
//                        print_r($partner->dummey_id . "  >>> " . $partner->id . "  <<  " . $dummey->daily_pv_tot . "<br/>");
////                        print_r($tot);
//                        $dummey->save();

                        $tot+=($temp + $temp_right);
                        $dummey = dummey::find($partner->dummey_id);
                        $dummey->daily_pv_tot = 46;
                        $dummey->save();
                        $temp_right = 0;
                        $temp = 0;
                        print_r($order_product . "  >>> " . $partner->nic_dummey . "  <<  " . ($tot) . ' main :' . $dummey->daily_pv_tot . "<br/>");
//                        print_r($dummey_main);
//                        print_r($partner->dummey_id . "  >>> " . $partner->id . "  <<  " . $dummey->daily_pv_tot . "<br/>");
                    }
                }
            }
        }
    }

    public function test() {
        $bind_id = 0;
        $totalLeftAnd_right = 0;
        $totDum = 0;
        $currentP = 0;
        $currentPV = 0;
        $pv_val = 0;
        $order_products = User::select(\DB::raw('users.id,users.user_nic,users.name, SUM(dummey_pvs.pv) as PV_value,dummeys.dummey_name,dummeys.id as dummey_id,dummeys.bind_id,dummeys.daily_pv_tot,dummeys.side'))
                        ->join('dummeys', 'dummeys.user_id', '=', 'users.id')
                        ->leftJoin('dummey_pvs', 'dummey_pvs.dummey_id', '=', 'dummeys.id')
                        ->groupBy('dummeys.id')
                        ->orderBy('dummeys.id', 'desc')->get();
        foreach ($order_products as $order_product) {
            $partners = DB::table('partners')
                    ->join('users', 'partners.user_id', '=', 'users.id')
                    ->join('dummeys', 'users.id', '=', 'dummeys.user_id')
                    ->select('partners.*', 'dummeys.id', 'dummeys.daily_pv_tot', 'partners.nic_dummey as dummey_id')
                    ->where([
                        ['dummeys.bind_id', 0],
                    ])
                    ->get();
            if ($order_product->PV_value !== null) {
                if ($order_product->bind_id !== 0) {
                    $totalLeftAnd_right+=$order_product->PV_value;
                    $dummeys2 = dummey::find($order_product->dummey_id);
                    $currentPV = $dummeys2->daily_pv_tot;
                    $dummeys2->daily_pv_tot = ($order_product->PV_value);
                    $dummeys2->save();
                }
            }
            foreach ($partners as $partner) {
                if ($order_product->dummey_id == $partner->dummey_id) {
                    $partns = DB::table('partners')
                            ->join('users', 'partners.user_id', '=', 'users.id')
                            ->join('dummeys', 'users.id', '=', 'dummeys.user_id')
                            ->select('partners.*', 'dummeys.id', 'dummeys.daily_pv_tot', 'partners.nic_dummey as dummey_id')
                            ->where([
                                ['partners.user_id', $partner->user_id],
                                ['dummeys.bind_id', 0],
                            ])
                            ->get();
                    foreach ($partns as $partn) {
                        if ($partner->dummey_id == $partn->nic_dummey) {
                            $pv_val+=$partn->daily_pv_tot;
                            $totDum+=$partn->daily_pv_tot;
                            $dummeys = dummey::find($partn->nic_dummey);
                            $dummeys->daily_pv_tot = ($totDum + $order_product->PV_value);
                            $dummeys->save();
                        }
                    }
                }
            }
            if ($order_product->bind_id == $bind_id) {
                $currentPV_Values = User::select(\DB::raw('users.id,users.user_nic,users.name, SUM(dummey_pvs.pv) as PV_value,dummeys.dummey_name,dummeys.id as dummey_id,dummeys.bind_id,dummeys.daily_pv_tot,dummeys.side'))
                        ->join('dummeys', 'dummeys.user_id', '=', 'users.id')
                        ->leftJoin('dummey_pvs', 'dummey_pvs.dummey_id', '=', 'dummeys.id')
                        ->groupBy('dummeys.id')
                        ->orderBy('dummeys.id', 'desc')
                        ->where([
                            ['dummeys.id', $order_product->bind_id],
                        ])
                        ->get();
                foreach ($currentPV_Values as $currentPV_Value) {
                    $currentP = $currentPV_Value->PV_value;
                }
                $dummey = dummey::find($order_product->bind_id);
                $dummey->daily_pv_tot = ($totalLeftAnd_right + $pv_val + $currentP);
                $dummey->save();
                $totalLeftAnd_right = 0;
                $currentP = 0;
                $pv_val = 0;
            }
            $totDum = 0;
            $bind_id = $order_product->bind_id;
            print_r($order_product . "<br/>");
        }
    }

}
