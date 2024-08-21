<?php

namespace App\Services;

use App\Models\User;
use Aws\S3\S3Client;
use Illuminate\Support\Facades\Storage;

class GenerateBackupConfig
{
    public function generateBackup($backup)
    {
        $user = User::find(auth()->id());
        
        $data = [
        "Schedule"=> [
            'Time'=>$backup->time,
            'Repeat'=>$backup->repeat,
            'AllowedDays'=>$backup->allowedDays,
        ],
        "Backup"=>[
            'Name'=>$backup->name,
            'Description'=>$backup->description,
            'TargetURL'=> "s3://{$backup->token}/?s3-server-name=minio%3A9000&s3-location-constraint=&s3-storage-class=&s3-client=aws&auth-username={$user->access_key}&auth-password={$user->secret_key}",
            'Settings'=>[
                ['Name'=>'encryption-module',
                    "Value"=> $backup->encryption
                ],
                ['Name'=>'dblock-size',
                    "Value"=>"50mb"
                ],
                ['Name'=>'passphrase',
                    "Value"=> $backup->passphrase
                ],
                ['Name'=>'--send-http-url',
                    "Value"=> "http://host.docker.internal:8000/api/data/{$backup->token}/{$backup->id}"
                ],
                ['Name'=>'--send-http-result-output-format',
                    "Value"=> 'Json'
                ]
            ]
        ]];

        $s3client = new S3Client([
            'version' => '2006-03-01',
            'region' => 'us-east-1',
            'use_path_style_endpoint' => true,
            'endpoint'=>'http://localhost:9000',
            'credentials'=> [
                'key'=> $user->access_key,
                'secret'=> $user->secret_key,
            ]
        ]);

        $s3client->createBucket(['Bucket'=>$backup->token]);
        
        config(['filesystems.disks.s3.key' => $user->access_key]);
        config(['filesystems.disks.s3.secret' => $user->secret_key]);
       
        Storage::disk('public')->put("{$backup->token}.json", json_encode($data));

    }

    public function updateBackup($backup)
    {
        $user = User::find(auth()->id());
        
        $data = [
        "Schedule"=> [
            'Time'=>$backup->time,
            'Repeat'=>$backup->repeat,
            'AllowedDays'=>$backup->allowedDays,
        ],
        "Backup"=>[
            'Name'=>$backup->name,
            'Description'=>$backup->description,
            'TargetURL'=> "s3://{$backup->token}/?s3-server-name=minio%3A9000&s3-location-constraint=&s3-storage-class=&s3-client=aws&auth-username={$user->access_key}&auth-password={$user->secret_key}",
            'Settings'=>[
                ['Name'=>'encryption-module',
                    "Value"=> $backup->encryption
                ],
                ['Name'=>'dblock-size',
                    "Value"=>"50mb"
                ],
                ['Name'=>'passphrase',
                    "Value"=> $backup->passphrase
                ],
                ['Name'=>'--send-http-url',
                    "Value"=> "http://host.docker.internal:8000/api/data/{$backup->token}/{$backup->id}"
                ],
                ['Name'=>'--send-http-result-output-format',
                    "Value"=> 'Json'
                ]
            ]
        ]];

        $s3client = new S3Client([
            'version' => '2006-03-01',
            'region' => 'us-east-1',
            'use_path_style_endpoint' => true,
            'endpoint'=>'http://localhost:9000',
            'credentials'=> [
                'key'=> $user->access_key,
                'secret'=> $user->secret_key,
            ]
        ]);
        
        config(['filesystems.disks.s3.key' => $user->access_key]);
        config(['filesystems.disks.s3.secret' => $user->secret_key]);
       
        Storage::disk('public')->put("{$backup->token}.json", json_encode($data));

    }
}
