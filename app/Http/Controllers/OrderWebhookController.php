<?php

namespace App\Http\Controllers;

use App\Jobs\OrderReceivedJob;
use Illuminate\Http\Request;

class OrderWebhookController extends Controller
{
    public function create(Request $request)
    {
        OrderReceivedJob::dispatch($request->all())->onQueue('orderCreated');
    }
}
