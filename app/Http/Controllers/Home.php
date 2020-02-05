<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

use App\Model\Champion;
use App\Model\Damage;

class Home extends Controller
{
    public function __invoke(Request $request){
        if($request->ajax()){
            return DataTables::of(
                    Champion::select(['champions.id as DT_RowId','champions.name','attack','attacked'])
                        ->join('champion_damage','champions.id','=','champion_id','left outer')
                )
                ->toJson();
        }
    }
    public function post(Request $request,Damage $damage){
        $request->validate([
            'attack' => 'required|integer|max:1000|min:1',
            'attacked' => 'required|integer|max:1000|min:1',
        ]);
        $damage->attack = $request->attack;
        $damage->attack = $request->attacked;
        $damage->save();
        return [
            'success' => true,
            'damage' => $damage
        ];
    }
}
