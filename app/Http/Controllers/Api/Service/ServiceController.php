<?php

namespace App\Http\Controllers\Api\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index(){
        $test['name'] = 'its work';
        return response()->json($test);
    }

    public function send(Request $request){

        try{
            $details['APP_NAME'] = $request->input('APP_NAME');
            $details['MAIL_TO'] =  $request->input('MAIL_TO');
            $details['SUBJECT'] =  $request->input('SUBJECT');
            $details['BODY'] = $request->input('BODY');    
            dispatch(new \App\Jobs\SendMailJob($details));
            return response()->json([
                'res_code'  => '200',
                'message'   => 'Mail Has Been Delivered',
            ], 200);
        }
        catch(\Exception $e) {
            \DB::rollBack();
            return response()->json([
                'err_code'  => '502',
                'message'   => 'Mail Not Delivered',
                'err_msg'   => $e->getMessage(),
                'err_trace'   => $e->getTrace(),
            ], 502);
        }
    }
}
