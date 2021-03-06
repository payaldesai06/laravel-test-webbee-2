<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Date;

class EventsController extends BaseController
{
    public function getEventsWithWorkshops() {
        return Event::with('workshops')->get()->toArray();
    }

    public function getFutureEventsWithWorkshops() {
        return Event::whereHas('workshops', function ($query)
        {
             $query->where('start','>',date('Y-m-d H:i:s'));
        })->get()->toArray();
    }
}
