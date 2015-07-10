<?php


namespace User\Business;

use ZF\OAuth2\Adapter\BcryptTrait;

/**
 * User
 */
class User extends OAuthUser {
    use BcryptTrait;

    /**
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * @param string $password
     *
     * @return User
     */
    public function changePassword($password) {
        $this->password = $this->createBcryptHash($password);

        return $this;
    }
}