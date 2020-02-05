<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

use App\Model\Champion;
use App\Model\Damage;

class Home extends Controller
{
    public function __invoke(Request $request){
        if($request->ajax() || true){
            return DataTables::of(
                    Champion::select(['champions.id','champions.name','attack','attacked'])
                        ->join('champion_damage','champions.id','=','champion_id','left outer')
                )
                ->toJson();
        }
    }
    public function update(){

    }
}
