<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SyLoginController extends Controller
{
    public function loginSy(Request $request)
    {
        $username=$request->username;
        $password=$request->password;
        $dataUser=$this->dataUser($username, $password);
        if ($dataUser->count()>0) {
            $role=$dataUser->toArray()[0];
            if ($role["role"]=="karyawan") {
                return redirect()->route("user.page.dashboard");
            }else if($role["role"]=="user")
            {
                return redirect()->route("pembukuan.page.dashboard");
            }else if($role["role"]=="admin")
            {
                return redirect()->route("admin.page.dashboard");
            }else{
                return redirect()->route("page.login");
            }
        }
        else
        {
            return redirect()->route("page.login");
        }
    }

    function dataUser($username, $password='$2y$12$MrcBMzkgc3r/O7pUTdMNZergx8MhAng32XmtMJeOsD64jT1bpl0WS')
    {        
        $dataUser=User::where("username","$username")
                        ->where("password","$password")->get();
        return $dataUser;
    }
}