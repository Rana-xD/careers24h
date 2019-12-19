<?php 

namespace App\Utils;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

    class Utils {

        public static function _encrypt($values) {
            if ($values != null) {
                $hashedValues = Hash::make($values);
                return $hashedValues;
            }
            return $values;
        }

        public static function _decrypt($value) {
            $password = "Puty@2019";
            if ($value != null) {
                $matchedPassword = Hash::check($password, $value);
                if ($matchedPassword == true) {
                    return true;
                }
                return false;
            }
            return false;
        }

    }

?>