<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //del campo USER_ID formulario
        if ($this->user_id == auth()->user()->id) {
            return true;
        }else{
            return false;
        }
    }


    public function rules()
    {
        $rules=[
            'name'=>'required',
            'slug'=>'required|unique:posts',
            'status'=>'required|in:1,2',
        ];
        if($this->status==2){
            $rules=array_merge($rules,[
                'category_id'=>'required',
                'tags'=>'required',
                'extract'=>'required',
                'body'=>'required',
            ]);
        };
        return $rules;
    }
}
