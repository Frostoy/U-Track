<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryLog;

class ReportsController extends Controller
{
    public function index()
    {
        $logs = InventoryLog::latest()->paginate(20);
        return view('reports.index', compact('logs'));
    }
}
