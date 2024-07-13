<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Aws\S3\S3Client;
use App\Models\User;
use App\Models\Backup;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BackupController extends Controller
{
    public function index(){

        
        $backups= Client::with(['user', 'backups'])
        ->whereHas('user', function($q){
            $q->where('user_id', auth()->id());})
        ->get();

        return view('client.backup.index', ['backups'=>$backups]);
    }

    public function download($id){
        
        $backup = Backup::findOrFail($id);
        $filepath = public_path("storage/{$backup->token}.json");
        return response()->download($filepath);

    }
}
