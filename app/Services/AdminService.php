<?php

namespace App\Services;

use App\Models\Admin;
use DB;
use Illuminate\Support\Facades\Log;


    class AdminService{

        public function loginInAdmin($identifiant,$password){
            $admin = Admin::where("identifiant",$identifiant)->first();
            if ($admin){
                if ($admin->password == $password){
                    return 1;
                }
                else{
                    return 0;
                }
            }
            return -1;
        }

    }
