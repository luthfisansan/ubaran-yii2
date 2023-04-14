<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\IdentityInterface;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // aturan validasi untuk username, password, dan rememberMe
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validasi password.
     * Ini adalah custom validator yang memanggil metode validatePassword() pada model User.
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Username atau password salah.');
            }
        }
    }

    /**
     * Login user.
     * @return bool Whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            // Cari user berdasarkan username
            $user = User::findByUsername($this->username);

            if ($user !== null && $user->validatePassword($this->password)) {
                // Lakukan login dengan objek User sebagai identitas
                return Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
            }
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
