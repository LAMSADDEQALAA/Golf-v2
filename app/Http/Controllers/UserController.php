<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view("user.index", ["users" => $users, "roles" => $roles]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function edit(User $user)
    {
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'NewPassword' => 'required',

        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->NewPassword,
        ];

        dd($data);

        if (!User::where('id', $request->id)
            ->update($data)) {

            Session::flash('message', 'Error occured while updating User Credentials');
            Session::flash('message_type', 'danger');
            return redirect()
                ->back();
        }

        Session::flash('message', 'User Credentials Were updated SuccessFuly');
        Session::flash('message_type', 'success');
        return redirect("/user");
    }
    public function EditUserRoles(User $user)
    {
        $roles = $user->roles->pluck('name');
        $user['roles'] = $roles;
        return response()->json($user);
    }
    public function UpdateUserRoles(Request $req)
    {
        $user = User::find($req->id);
        if (!$user->syncRoles($req->roles)) {
            Session::flash('message', 'Error occured While Updating User Roles');
            Session::flash('message_type', 'danger');
            return redirect()
                ->back();
        }
        Session::flash('message', 'User Roles were Updated');
        Session::flash('message_type', 'success');
        return redirect("/user");
    }
    public function AccountSettings()
    {
        return view("user.AccountSetting");
    }
    public function UpdatePassword(Request $request)
    {
        $request->validate([
            "currentPassword" => "required",
            "newPassword" => "required",
            "confirmPassword" => "required",
        ]);

        $user = User::where("email", $request->email)->get();
        dd("got the user", $user);
        $oMatch = Hash::make($request->CurrentPassword) === $user->password;
        if (!$oMatch) {
            Session::flash('message', 'the Current password is false Please try again');
            Session::flash('message_type', 'danger');
            return redirect()
                ->back();
        }
        dd("Current Old Pass is func is good", $oMatch);
        $nMatch = $request->newPassword === $request->confirmPassword;
        if (!$nMatch) {
            Session::flash('message', 'the New And Confirm password are not a match');
            Session::flash('message_type', 'danger');
            return redirect()
                ->back();
        }
        dd("new confirm Pass is func is good", $nMatch);
        if (!$user->update(["password" => Hash::make($request->newPassword)])) {

            Session::flash('message', 'Error occured While updating the password');
            Session::flash('message_type', 'danger');
            return redirect()
                ->back();
        }
        dd("password was updated");

        Session::flash('message', 'Role Deleted SuccessFuly');
        Session::flash('message_type', 'success');
        return redirect("/role");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
