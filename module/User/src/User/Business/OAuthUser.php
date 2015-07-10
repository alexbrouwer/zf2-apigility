<?php


namespace User\Business;

use ZF\OAuth2\Doctrine\Entity\UserInterface;

/**
 * OAuthUser
 */
class OAuthUser implements UserInterface {
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    protected $client;
    protected $accessToken;
    protected $authorizationCode;
    protected $refreshToken;

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getClient() {
        return $this->client;
    }

    /**
     * @param mixed $client
     *
     * @return OAuthUser
     */
    public function setClient($client) {
        $this->client = $client;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAccessToken() {
        return $this->accessToken;
    }

    /**
     * @param mixed $accessToken
     *
     * @return OAuthUser
     */
    public function setAccessToken($accessToken) {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorizationCode() {
        return $this->authorizationCode;
    }

    /**
     * @param mixed $authorizationCode
     *
     * @return OAuthUser
     */
    public function setAuthorizationCode($authorizationCode) {
        $this->authorizationCode = $authorizationCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRefreshToken() {
        return $this->refreshToken;
    }

    /**
     * @param mixed $refreshToken
     *
     * @return OAuthUser
     */
    public function setRefreshToken($refreshToken) {
        $this->refreshToken = $refreshToken;

        return $this;
    }

    /**
     * @return array
     */
    public function getArrayCopy() {
        // Return the bare minimum for OAuth to work
        return array(
            'id' => $this->getId(),
            'username' => $this->getUsername(),
            'password' => $this->getPassword()
        );
    }
}