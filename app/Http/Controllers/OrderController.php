<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function studentList()
    {
        if (isset(request()->search)) {
            $allStudents = Order::where('name', 'LIKE', '%' . request()->search . '%')->paginate(10);
        } else {
            $allStudents = Order::paginate(10);
        }
        return view('students', compact('allStudents'));

    }

    public function editStudentList($payment_id)
    {
        $student = Order::where('payment_id', $payment_id)->first();
        return view('update-student', compact('student'));
    }

    public function updateStudentDetail(Request $request)
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
        $age = array();
        $request->all();
        return empty($request->all());
        // if(isset($request))

    }
}
