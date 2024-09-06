<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiEventRequest;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public static function receiveData(ApiEventRequest $request, $token, $id){
        
        Storage::disk('public')->put("{$token}.json", json_encode($request->getContent()));

        $data = [
            'token'=>$token,
            'backup_id'=>$id,
            'name' => $request->validated('Extra.backup-name'),
            'duplicati_index'=>$request->validated('Extra.backup-id'),
            'operation_name' => $request->validated('Extra.OperationName'),
            'begin_time' => $request->validated('Data.BeginTime'),
            'end_time' => $request->validated('Data.EndTime'),
            'duration' => $request->validated('Data.Duration'),
            'warnings' => $request->validated('Data.WarningsActualLength'),
            'errors' => $request->validated('Data.ErrorsActualLength'),
            'log'=> $request->getContent()
        ];
        
        $report = new Report($data);
        $report->save();

        return;
    }
}
