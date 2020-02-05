<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Champion as Model;
use App\Model\Damage;

class Champion extends Controller
{
    public function __invoke(Request $request,Model $champion){
        $nickName = $champion->nickName()->pluck('name');
        $damage = $champion->damage()->where('gubun','C')->first(['attack','attacked']);
        return view('partials.championform',compact('nickName','champion','damage'));
    }
}
