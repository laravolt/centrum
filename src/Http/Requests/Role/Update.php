<?php

namespace Laravolt\Epicentrum\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $table = app(\Laravolt\Acl\Models\Role::class)->getTable();
        $id = $this->route()->parameter('role');

        return [
            'name'        => "required|unique:$table,name,$id",
        ];
    }
}
