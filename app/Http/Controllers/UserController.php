<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $cust = Customer::all();
        $data = compact('cust');
        return view('Layout.Home')->with($data);
    }
    public function insert()
    {
        return view('Layout.registration');
    }
    public function register(Request $req)
    {
        $validate = $req->validate([
            'cname' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            // 'dob' => 'required',
            'mobile' => 'required',
            'password' => 'required'

        ]);

        $customer = new Customer;

        $customer->cname = $req->cname;
        $customer->email = $req->email;
        $customer->gender = $req->gender;
        $customer->status = $req->active;
        $customer->dob = $req->date;
        $customer->mobile = $req->mobile;
        $customer->password = Hash::make($req->password);
        $customer->save();
        return redirect("login")->with('InsertSuccess', 'Record Inserted Successfully');
    }
    public function delete($id)
    {
        $cust = Customer::find($id);
        $data = compact('cust');
        $cust->delete($data);
        return redirect("Home")->with('DeleteSuccess', 'Data Deleted Successfully');
    }
    public function edit($id)
    {
        $cust = Customer::find($id);
        $data = compact('cust');

        return view('Layout.Update', $data);
    }
    public function update($id, Request $req)
    {
        $customer = Customer::find($id);
        $customer->cname = $req->cname;
        $customer->email = $req->email;
        $customer->gender = $req->gender;
        $customer->status = $req->active;
        $customer->dob = $req->date;
        $customer->mobile = $req->mobile;
        $customer->password = Hash::make($req->password);
        $customer->save();
        return redirect("Home")->with('UpdateSuccess', 'Data Updated Successfully');
    }

    public function login()
    {
        return view('Layout.Login');
    }
    public function auth(Request $req)
    {

        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            return redirect("Home")->with('LoginSuccess', 'Login Successfull');
        } else {
            return redirect()->back()->with('LoginFailed', 'Login Falied');
        }

    }
    public function logout()
    {
        \Session::flush();
        \Auth::logout();
        // return redirect()->back()->with('message', 'Logout Successfull');
        return redirect("login")->with('LogoutSuccess', 'Logout Successfull');
    }
}