<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Order;
use App\Models\Standard;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function studentList(Request $request)
    {

        $allStudents = Order::with('standard', 'board');
        if (isset($request->search)) {
            $allStudents = $allStudents->where('name', 'LIKE', '%' . $request->search . '%');
        }
        if (isset($request->board_name)) {
            $allStudents = $allStudents->whereHas('board', function ($query) use ($request) {
                $query->where('board_name', $request->board_name);
            });
        }
        if (isset($request->class_name)) {
            $allStudents = $allStudents->whereHas('standard', function ($query) use ($request) {
                $query->where('class_name', $request->class_name);
            });
        }

        $allStudents = $allStudents->paginate(10);

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
        $allOrders = Order::query();
        if (isset($request->search)) {
            $allOrders = $allOrders->where('ORDER_ID', 'LIKE', '%' . $request->search . '%')->orWhere('name', 'LIKE', '%' . $request->search . '%')->orWhere('select_class', 'LIKE', '%' . $request->search . '%')->orWhere('select_board', 'LIKE', '%' . $request->search . '%')->orWhere('school_name', 'LIKE', '%' . $request->search . '%')->orWhere('city', 'LIKE', '%' . $request->search . '%');

        }
        if (isset($request->paymentstatus)) {
            $allOrders = $allOrders->where('paymentstatus', $request->paymentstatus == 'success' ? 'TXN_SUCCESS' : 'TXN_FAILURE');
        }
        if (isset($request->start_date) || isset($request->end_date)) {
            $allOrders = $allOrders->whereDate('date', '>=', isset($request->start_date) ? Carbon::parse($request->start_date) : Carbon::parse(now()))
                ->whereDate('date', '<=', isset($request->end_date) ? Carbon::parse($request->end_date) : Carbon::parse(now()));
        }
        $allOrders = $allOrders->paginate(10);
        return view('orders', compact('allOrders'));

    }
}
