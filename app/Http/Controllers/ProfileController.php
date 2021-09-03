<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function index(){
        $respon = [
            "status" => "200",
            "message" => "Ini URI dari controller",
            "me" => [
                "name" => "AiC",
                "gender" => "Laki"
            ]
        ];

        return $respon;
    }
    function hapus(){

    }
    function update(){

    }
}
