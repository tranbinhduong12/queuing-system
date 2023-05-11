<?php

namespace App\Http\Controllers;

use App\Models\history_user;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function historyUser($action)
    {
        $history = new history_user();
        $history->user_id = auth()->user()->id;
        $history->ip = request()->ip();
        $history->action = $action;
        $history->save();
    }
}
