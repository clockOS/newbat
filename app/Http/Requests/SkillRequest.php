<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SkillRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user =\Auth::user();

        $level = $user->level;  //�û��ĵȼ�

        $count = $user->skills()->count();  //�û�ӵ�еļ�����

        if($count>0){
            if(($count<2)AND($level>4)){    //���û��ȼ�����4��ֵӵ��һ������
                return true;
            }

            return false;

        }else{
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subskill' => 'required'
        ];
    }
}
