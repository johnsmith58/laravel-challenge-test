<?php

namespace App\Http\Controllers;

use App\Services\EmployeeManagement\Staff;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    use ApiResponser;
    
    public function payroll(Staff $staff)
    {
        $data = $staff->salary();
        return $this->success(200, $data);
    }
}
