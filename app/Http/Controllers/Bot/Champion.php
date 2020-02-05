<?php

namespace App\Http\Controllers\Bot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Champion as Model;
use App\Model\NickName;
use App\Model\Damage;

class Champion extends Controller
{
    public function __invoke(Request $request,$gubun,$name){
        $championId = Model::where('name',$name)->value('id');
        if($championId == null){
            $championId = NickName::where('name',$name)->value('id');
        }
        $data = Damage
            ::where('champion_id',$championId)
            ->where('gubun',$gubun)
            ->first(['attack','attacked']);
        if($data->attack > 110) $comment = '이거슨 10사기';
        elseif($data->attack > 90) $comment = '이거슨 10쓰레기';
        return view('markdown.championAttack',compact('data','comment'));
    }
}
