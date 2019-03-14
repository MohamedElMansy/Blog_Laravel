<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $id=($this->segment(2));

        return [
            'title'=> 'required|min:3|unique:posts,title,'.$id,
            'description'=>'required|min:10,'.$id,

        ];
    }

}
