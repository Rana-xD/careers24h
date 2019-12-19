<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \App\Utils\Utils;
use Illuminate\Support\Facades\DB;

class AuthenticationController extends Controller
{
    public $entityName = "User";

    public function validateLogin(Request $request) {
        $username = $request->input("username");
        $password = $request->input("password");
        $hashedPassword = Utils::_encrypt($password);
        $data = array(
            'clientId' => $username,
            'clientSecret' => $hashedPassword
        );
        $entityName= "User";
        // $user = Controller::_getAll($entityName);
        $data1 = [];
        $data1["list"] = array(
            'id' => 1,
            "name" => "Yan Puty"
        );

        var_dump($data1["list"]);
    }

    public function signUp(Request $request) {
        $password = $request->input("password");
        $hashedPassword = Utils::_encrypt($password);
        $phoneNumber = $request->input("phonNumber");
        $emailAddress = $request->input("emailAddress");
        $uuid = "";
        $firstName = $request->input("firtName");
        $lastName = $request->input("lastName");
        $type = $request->input("type");
        $gender = $request->input("gender");
        $dateOfBirth = $request->input("dateOfBirth");
        $users = new User();
        $userData = [
            "clientId" => $request->input("username"),
            "clientSecret" => $hashedPassword,
            "phoneNumber" => $phoneNumber,
            "uuid" => $uuid,
            "createdBy" => 1,
            "type" => $type
        ];
        $userProfile = [
            "gender" => $gender,
            "firstName" => $firstName,
            "lastName" => $lastName,
            "dateOfBirth" => $dateOfBirth,
            "userId" => 1
        ];
        $user = DB::table('User')
                ->where("emailAddress", $emailAddress)
                ->get();
        if (isset($user) != true) {
            $error = [
                "message"=> "This Email is already existed.",
                "status"=> 500
            ];
            // return response()->view("Employee.EmployeeList", $error);
            return $error;
        }
        return $userData;

    }
}
