<?php

namespace App\Http\Controllers;

use App\Services\EmployeeManagement\Applicant;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class JobController extends Controller
{
    use ApiResponser;
    
    public function apply(Request $request, Applicant $applicant)
    {
        $data = $applicant->applyJob();
        return $this->success(200, $data);
    }
}
