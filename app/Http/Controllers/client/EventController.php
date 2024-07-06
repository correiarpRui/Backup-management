<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Backup;
use Faker\Guesser\Name;

class EventController extends Controller
{
    public function index(){

    $data = Backup::with('reports')->where('user_id', '=', auth()->user()->id)->get();


        $data1 = [
   "Data" => [
         "DeletedFiles" => 0, 
         "DeletedFolders" => 0, 
         "ModifiedFiles" => 0, 
         "ExaminedFiles" => 1, 
         "OpenedFiles" => 0, 
         "AddedFiles" => 0, 
         "SizeOfModifiedFiles" => 0, 
         "SizeOfAddedFiles" => 0, 
         "SizeOfExaminedFiles" => 4284, 
         "SizeOfOpenedFiles" => 0, 
         "NotProcessedFiles" => 0, 
         "AddedFolders" => 0, 
         "TooLargeFiles" => 0, 
         "FilesWithError" => 0, 
         "ModifiedFolders" => 0, 
         "ModifiedSymlinks" => 0, 
         "AddedSymlinks" => 0, 
         "DeletedSymlinks" => 0, 
         "PartialBackup" => false, 
         "Dryrun" => false, 
         "MainOperation" => "Backup", 
         "CompactResults" => null, 
         "VacuumResults" => null, 
         "DeleteResults" => null, 
         "RepairResults" => null, 
         "TestResults" => [
            "MainOperation" => "Test", 
            "VerificationsActualLength" => 3, 
            "Verifications" => [
               [
                  "Key" => "duplicati-20240705T225506Z.dlist.zip.aes", 
                  "Value" => [
                  ] 
               ], 
               [
                        "Key" => "duplicati-i698764784c524c95a1982a74eb69e953.dindex.zip.aes", 
                        "Value" => [
                        ] 
                     ], 
               [
                              "Key" => "duplicati-b8081ce4e34bf47b8b1647fac1108ca3e.dblock.zip.aes", 
                              "Value" => [
                              ] 
                           ] 
            ], 
            "ParsedResult" => "Success", 
            "Interrupted" => false, 
            "Version" => "2.0.8.1 (2.0.8.1_beta_2024-05-07)", 
            "EndTime" => "2024-07-06T01:40:27.111895Z", 
            "BeginTime" => "2024-07-06T01:40:27.056236Z", 
            "Duration" => "00:00:00.0556590", 
            "MessagesActualLength" => 0, 
            "WarningsActualLength" => 0, 
            "ErrorsActualLength" => 0, 
            "BackendStatistics" => [
                                    "RemoteCalls" => 5, 
                                    "BytesUploaded" => 0, 
                                    "BytesDownloaded" => 4119, 
                                    "FilesUploaded" => 0, 
                                    "FilesDownloaded" => 3, 
                                    "FilesDeleted" => 0, 
                                    "FoldersCreated" => 0, 
                                    "RetryAttempts" => 0, 
                                    "UnknownFileSize" => 0, 
                                    "UnknownFileCount" => 0, 
                                    "KnownFileCount" => 3, 
                                    "KnownFileSize" => 4119, 
                                    "LastBackupDate" => "2024-07-05T22:55:06+00:00", 
                                    "BackupListCount" => 1, 
                                    "TotalQuotaSpace" => 0, 
                                    "FreeQuotaSpace" => 0, 
                                    "AssignedQuotaSpace" => -1, 
                                    "ReportedQuotaError" => false, 
                                    "ReportedQuotaWarning" => false, 
                                    "MainOperation" => "Backup", 
                                    "ParsedResult" => "Success", 
                                    "Interrupted" => false, 
                                    "Version" => "2.0.8.1 (2.0.8.1_beta_2024-05-07)", 
                                    "EndTime" => "0001-01-01T00:00:00", 
                                    "BeginTime" => "2024-07-06T01:40:26.813923Z", 
                                    "Duration" => "00:00:00", 
                                    "MessagesActualLength" => 0, 
                                    "WarningsActualLength" => 0, 
                                    "ErrorsActualLength" => 0 
                                 ] 
         ], 
         "ParsedResult" => "Success", 
         "Interrupted" => false, 
         "Version" => "2.0.8.1 (2.0.8.1_beta_2024-05-07)", 
         "EndTime" => "2024-07-06T01:40:27.144994Z", 
         "BeginTime" => "2024-07-06T01:40:26.813919Z", 
         "Duration" => "00:00:00.3310750", 
         "MessagesActualLength" => 12, 
         "WarningsActualLength" => 0, 
         "ErrorsActualLength" => 0, 
         "BackendStatistics" => [
                                       "RemoteCalls" => 5, 
                                       "BytesUploaded" => 0, 
                                       "BytesDownloaded" => 4119, 
                                       "FilesUploaded" => 0, 
                                       "FilesDownloaded" => 3, 
                                       "FilesDeleted" => 0, 
                                       "FoldersCreated" => 0, 
                                       "RetryAttempts" => 0, 
                                       "UnknownFileSize" => 0, 
                                       "UnknownFileCount" => 0, 
                                       "KnownFileCount" => 3, 
                                       "KnownFileSize" => 4119, 
                                       "LastBackupDate" => "2024-07-05T22:55:06+00:00", 
                                       "BackupListCount" => 1, 
                                       "TotalQuotaSpace" => 0, 
                                       "FreeQuotaSpace" => 0, 
                                       "AssignedQuotaSpace" => -1, 
                                       "ReportedQuotaError" => false, 
                                       "ReportedQuotaWarning" => false, 
                                       "MainOperation" => "Backup", 
                                       "ParsedResult" => "Success", 
                                       "Interrupted" => false, 
                                       "Version" => "2.0.8.1 (2.0.8.1_beta_2024-05-07)", 
                                       "EndTime" => "0001-01-01T00:00:00", 
                                       "BeginTime" => "2024-07-06T01:40:26.813923Z", 
                                       "Duration" => "00:00:00", 
                                       "MessagesActualLength" => 0, 
                                       "WarningsActualLength" => 0, 
                                       "ErrorsActualLength" => 0 
                                    ] 
      ], 
   "Extra" => [
                                          "OperationName" => "Backup", 
                                          "machine-id" => "9f42327333924d478b7365aeb0871794", 
                                          "backup-name" => "DD Coke", 
                                          "backup-id" => "DB-11" 
                                       ], 
   "LogLines" => [
                                          ], 
   "Exception" => null 
];
        dd($data1['Data']['BeginTime']);


        return view('client.events.index', ['data'=>$data]);
    }


}
