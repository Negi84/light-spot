<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index(Request $request)
    {
        if (isset(request()->search)) {
            $allClass = Standard::where('class_name', 'LIKE', '%' . request()->search . '%')->paginate(10);
        } else {
            $allClass = Standard::paginate(10);
        }
        return view('class', compact('allClass'));
    }
    public function edit(Request $request, $id)
    {
        $class = Standard::where('class_id', $id)->first();
        return view('update-class', compact('class'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'class_name' => 'required',
            'class_price' => 'required',
        ]);

        Standard::where('class_id', $request->class_id)->update(['class_name' => $request->class_name, 'class_price' => $request->class_price]);
        return redirect('class')->with('success', 'Class has been updated successfully');

    }
}
