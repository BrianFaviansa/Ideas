<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index() {
        // if(!Gate::allows('admin')) {
        //     abort(403);
        // }

        // if(Gate::denies('admin')) {
        //     abort(403);
        // }

        // $this->authorize('admin');

        return view('admin.dashboard');
    }
}
