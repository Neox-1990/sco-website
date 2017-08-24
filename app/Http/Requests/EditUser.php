<?php

namespace App\Http\Requests;

use App\Events\UserUpdateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class EditUser extends FormRequest
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
          'oldPassword' => 'required_with_all:password,password_confirmation|required_with:changePassword',
          'password' => 'string|min:6|max:255|required_with_all:oldPassword,password_confirmation|required_with:changePassword',
          'password_confirmation' => 'same:password|required_with_all:password,oldPassword|required_with:changePassword',

          'name' => 'required_with_all:password,changeName|string|max:255',
          'password' => 'required_with_all:name,changeName|string|max:255',

          'email' => 'email|string|max:255|unique:users|required_with_all:password,changeEmail',
          'password' => 'required_with_all:email,changeEmail|string|max:255'
        ];
    }
    public function check()
    {
        $result = [
        'check' => false,
        'error' => '',
        'flash' => ''
      ];

        if ($this->has('changePassword')) {
            //dd($this->input('oldPassword'), bcrypt($this->input('oldPassword')), auth()->user()->password);
            if (Hash::check($this->input('oldPassword'), auth()->user()->password)) {
                $user = auth()->user();
                $user->password = Hash::make($this->input('password'));
                $user->save();
                $result['check'] = true;
                $result['flash'] = 'Password successfully changed.';
                event(new UserUpdateEvent($user, 'password changed'));
            } else {
                $result['error'] = 'Wrong Password.';
                $result['flash'] = 'An error occurred.';
            }
        } elseif ($this->has('changeName')) {
            if (Hash::check($this->input('password'), auth()->user()->password)) {
                $user = auth()->user();
                $user->name = $this->input('name');
                $user->save();
                $result['check'] = true;
                $result['flash'] = 'Name successfully changed.';
                event(new UserUpdateEvent($user, 'name changed'));
            } else {
                $result['error'] = 'Wrong Password.';
                $result['flash'] = 'An error occurred.';
            }
        } elseif ($this->has('changeEmail')) {
            if (Hash::check($this->input('password'), auth()->user()->password)) {
                $user = auth()->user();
                $user->email = $this->input('email');
                $user->save();
                $result['check'] = true;
                $result['flash'] = 'Email successfully changed. Remember to use it as login.';
                event(new UserUpdateEvent($user, 'email changed'));
            } else {
                $result['error'] = 'Wrong Password.';
                $result['flash'] = 'An error occurred.';
            }
        } else {
            $result['error'] = 'Unknown error.';
            $result['flash'] = 'An error occurred.';
        }
        return $result;
    }
}
