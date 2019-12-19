<?php 

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserType extends Enum {
    
    const EMPLOYEE = 1;
    const CANDIDATE = 2;
    const ADMIN = 3;
}

?>