<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;


class MyFormRequest extends FormRequest {
    
    public function authorize() {
        return true;
    }
    
    /**
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function params() {
        return $this->post('keyword', "hoge");
    }
}



class MailController extends Controller
{

    public function mailForward(MyFormRequest $request)
    {
        $query = ['keyword' => $request->params()];
        print_r($query);
        $validation = Validator::make($query, [
            'keyword' => ['required_unless:forwarding,2|nullable|string'],
        ]);
        echo $validation->fails() ? "failed" : "passed";
        return "hello";
    }

}
