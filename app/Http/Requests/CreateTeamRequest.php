<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTeamRequest extends FormRequest
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
        return [
            'name' => 'required',
            'car' => 'required',
            'number' => 'required',

            /*'driver1.name' => 'required',
            'driver1.irid' => 'required|numeric',
            'driver1.ir' => 'required|numeric|min:2000',
            'driver1.sr1' => 'required|in:c,b,a,p',
            'driver1.sr2' => 'required|numeric',

            'driver2.name' => 'required',
            'driver2.irid' => 'required|numeric',
            'driver2.ir' => 'required|numeric|min:2000',
            'driver2.sr1' => 'required|in:c,b,a,p',
            'driver2.sr2' => 'required|numeric',

            'driver3.name' => 'nullable|required_with:driver3.irid',
            'driver3.irid' => 'nullable|required_with:driver3.name|numeric',
            'driver3.ir' => 'nullable|required_with_all:driver3.irid,driver3.name|numeric|min:2000',
            'driver3.sr1' => 'nullable|required_with_all:driver3.irid,driver3.name|in:c,b,a,p',
            'driver3.sr2' => 'nullable|required_with_all:driver3.irid,driver3.name|numeric',

            'driver4.name' => 'nullable|required_with:driver4.irid',
            'driver4.irid' => 'nullable|required_with:driver4.name|numeric',
            'driver4.ir' => 'nullable|required_with_all:driver4.irid,driver4.name|numeric|min:2000',
            'driver4.sr1' => 'nullable|required_with_all:driver4.irid,driver4.name|in:c,b,a,p',
            'driver4.sr2' => 'nullable|required_with_all:driver4.irid,driver4.name|numeric',

            'driver5.name' => 'nullable|required_with:driver5.irid',
            'driver5.irid' => 'nullable|required_with:driver5.name|numeric',
            'driver5.ir' => 'nullable|required_with_all:driver5.irid,driver5.name|numeric|min:2000',
            'driver5.sr1' => 'nullable|required_with_all:driver5.irid,driver5.name|in:c,b,a,p',
            'driver5.sr2' => 'nullable|required_with_all:driver5.irid,driver5.name|numeric',

            'driver6.name' => 'nullable|required_with:driver6.irid',
            'driver6.irid' => 'nullable|required_with:driver6.name|numeric',
            'driver6.ir' => 'nullable|required_with_all:driver6.irid,driver6.name|numeric|min:2000',
            'driver6.sr1' => 'nullable|required_with_all:driver6.irid,driver6.name|in:c,b,a,p',
            'driver6.sr2' => 'nullable|required_with_all:driver6.irid,driver6.name|numeric'*/
        ];

        //return [];
    }
    public function checkDrivers()
    {
    }
}
