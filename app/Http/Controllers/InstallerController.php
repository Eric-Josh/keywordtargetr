<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Log;

class InstallerController extends Controller
{
    public function install()
    {
        return view('install');
    }

    public function store(Request $request)
    {
        $request->validate([
            'app_url'     => 'required|url',
            'db_name'     => 'required',
            'db_user'     => 'required',
        ]);

        $path = base_path('.env');
        $envDb = [
            'APP_URL'       => $request->app_url,
            'DB_DATABASE'   => $request->db_name,
            'DB_USERNAME'   => $request->db_user,
            'DB_PASSWORD'   => $request->db_password,
        ];
        $envConfig = [
            'APP_URL'       => env('APP_URL'),
            'DB_DATABASE'   => env('DB_DATABASE'),
            'DB_USERNAME'   => env('DB_USERNAME'),
            'DB_PASSWORD'   => env('DB_PASSWORD'),
        ];

        /*  We loop through the .env file config
        *   and the config db values
        *   if is not equal replace only that exact value
        */
        foreach($envDb as $envDbKey => $dbConf){
            foreach($envConfig as $envKey => $envConf){
                if($envDbKey == $envKey && $dbConf != $envConf){
                    Log::info('==============Add to '.$dbConf.' .env ...=================');
                    if(file_exists($path)){
                        file_put_contents($path,str_replace($envDbKey.'='.$envConf, $envDbKey.'='.$dbConf, file_get_contents($path)));
                    }
                }else{
                    Log::info('No Changes was made ');
                }
            }
        }

        return redirect()->route('install-complete');
    }

    public function completed()
    {
        return view('complete-install');
    }

    public function seedDb(Request $request)
    {
        // artisan import db
        Log::info('==============Migration Started...==============');

        Artisan::call('db:seed --force');
        
        Log::info('==============Migration Completed...==============');

        return redirect()->route('home');
    }
}
