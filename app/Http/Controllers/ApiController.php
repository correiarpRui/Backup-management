<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public static function receiveData(Request $request, $token, $id){
        
        $data = $request->post();
      
        $report = new Report();
        $report->token = $token;
        $report->backup_id = $id;
        $report->name = $data['Extra']['backup-name'];
        $report->operation_name = $data['Extra']['OperationName'];
        $report->begin_time = $data['Data']['BeginTime'];
        $report->end_time = $data['Data']['EndTime'];
        $report->duration = $data['Data']['Duration'];
        $report->warnings = $data['Data']['WarningsActualLength'];
        $report->errors = $data['Data']['ErrorsActualLength'];

        $report->save();
        
        return ;

        
    }
}
