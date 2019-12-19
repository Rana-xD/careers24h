<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public static function listAllEmployee1() {
        return view("Employee.EmployeeList1");
    }

    public static function listAllEmployee2() {
        return view("Employee.EmployeeList2");
    }

    public static function listAllEmployee3() {
        return view("Employee.EmployeeList3");
    }
    
    public static function listAllEmployee4() {
        return view("Employee.EmployeeList4");
    }
    
    public static function single1() {
        return view("Employee.EmployerSingle1");
    }
    
    public static function single2() {
        return view("Employee.EmployerSingle2");
    }
    
    public static function dashboard() {
        return view("Employee.EmployeeList4");
    }
    
    public static function jobManage() {
        return view("Employee.Dashboard.EmployerManageJob");
    }

    public static function employerPackage() {
        return view("Employee.Dashboard.EmployerPackage");
    }

    public static function employerProfile() {
        return view("Employee.Dashboard.EmployerProfile");
    }

    public static function employerPostNew() {
        return view("Employee.Dashboard.EmployerPostNew");
    }

    public static function employerResume() {
        return view("Employee.Dashboard.EmployerResume");
    }

    public static function employerTransaction() {
        return view("Employee.Dashboard.EmployerTransaction");
    }

    public static function jobAlert() {
        return view("Employee.Dashboard.EmployerJobAlert");
    }

    public static function employerChangePassword() {
        return view("Employee.Dashboard.EmployerChangePassword");
    }
}
