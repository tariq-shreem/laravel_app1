<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Session;

trait ClientsTrait
{
    private function ClientRedireact($msg){
        Session::flash('msg',$msg);
        return redirect(route('clients.index'));
    }

}
