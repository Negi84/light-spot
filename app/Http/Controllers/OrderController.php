<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Order;
use App\Models\Standard;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        if (!empty($request->all())) {
            $allStudents = Order::where('name', 'LIKE', '%' . request()->search . '%');
            if (isset($request->board_name)) {
                $allStudents->whereHas('board', function ($query) use ($request) {
                    $query->where('board_name', $request->board_name);
                });
            }
            if (isset($request->class_name)) {
                $allStudents->whereHas('standard', function ($query) use ($request) {
                    $query->where('class_name', $request->class_name);
                });
            }

            $allStudents = $allStudents->paginate(10);
        } else {
            $allStudents = Order::paginate(10);
        }

        $standards = Standard::select('class_name')->get()->filter(function ($value) {
            return $value->class_name != null || !empty($value->class_name);
        })->unique('class_name');

        $boards = Board::select('board_name')->get()->filter(function ($value) {
            return $value->board_name != null || !empty($value->board_name);
        })->unique('board_name');

        return view('students', compact('allStudents', 'standards', 'boards'));
    }

    public function edit($payment_id)
    {
        $student = Order::where('payment_id', $payment_id)->first();
        return view('update-student', compact('student'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required|digits:10',
            'password' => 'required',
            'select_class' => 'required',
            'select_board' => 'required',
            'school_name' => 'required',
            'city' => 'required',
        ]);

        Order::where('payment_id', $request->payment_id)->update(['name' => $request->name, 'email' => $request->email,
            'mobile' => $request->mobile, 'password' => $request->password, 'select_class' => $request->select_class, 'select_board' => $request->select_board, 'school_name' => $request->school_name, 'city' => $request->city]);
        return redirect('students')->with('success', 'Student has been updated successfully');

    }
    public function orderList(Request $request)
    {
        if (empty($request->all())) {
            $allOrders = Order::paginate(10);
        } else {
            if (isset($request->search)) {
                $allOrders = Order::where('ORDER_ID', 'LIKE', '%' . $request->search . '%')->orWhere('name', 'LIKE', '%' . $request->search . '%')->orWhere('select_class', 'LIKE', '%' . $request->search . '%')->orWhere('select_board', 'LIKE', '%' . $request->search . '%')->orWhere('school_name', 'LIKE', '%' . $request->search . '%')->orWhere('city', 'LIKE', '%' . $request->search . '%')->paginate(10);

            } else {
                if (isset($request->paymentstatus)) {
                    $allOrders = Order::where('paymentstatus', $request->paymentstatus == 'success' ? 'TXN_SUCCESS' : 'TXN_FAILURE')->paginate(10);
                }
                if (isset($request->start_date) || isset($request->end_date)) {
                    $allOrders = Order::whereDate('date', '>=', isset($request->start_date) ? Carbon::parse($request->start_date) : Carbon::parse(now()))
                        ->whereDate('date', '<=', isset($request->end_date) ? Carbon::parse($request->end_date) : Carbon::parse(now()))
                        ->paginate(10);
                }
            }
        }
        return view('orders', compact('allOrders'));

    }
}
