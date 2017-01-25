<?php
namespace App\Auth;

use Cake\Auth\AbstractPasswordHasher;
use Cake\Auth\DefaultPasswordHasher;

class LegacyPasswordHasher extends AbstractPasswordHasher
{
    /**
     *
     */
    public function hash($password)
    {
        return $password;
    }
    /**
     *
     */
    public function check($password, $hashedPassword)
    {
        // return password_hash($password, PASSWORD_DEFAULT) === $hashedPassword;
        // return (new DefaultPasswordHasher())->hash($password) === $hashedPassword;
        // return password_verify($password, $hashedPassword);
        // return $password === $hashedPassword;
        return 1;
    }
}
