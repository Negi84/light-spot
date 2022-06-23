<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Standard;

class SubscribeController extends Controller
{
    public function index()
    {
        $standards = Standard::all();
        $boards = Board::select('board_name', 'board_id')->get();
        return view('subscribe', compact('standards', 'boards'));
    }
}
