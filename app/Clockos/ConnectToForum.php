<?php
/**
 * Created by PhpStorm.
 * User: YELLOVE
 * Date: 1/8/2016
 * Time: 10:03 AM
 */

namespace Clockos;


class ConnectToForum
{
    const REMEMBER_ME_KEY = 'flarum_remember';

    private $config;

    public function __construct()
    {
        $this->config = config('app.forum');
    }

    /**
     * Call this method after your user is successfully authenticated.
     *
     * @param $username
     * @param $email
     */
    public function login($email,$password)
    {

        $token = $this->getToken($email, $password);

        $this->setRememberMeCookie($token);

    }

    /**
     * Call this method after you logged out your user.
     */
    public function logout()
    {
        $this->removeRememberMeCookie();
    }

    /**
     * Redirects a user back to the forum.
     */
    public function redirectToForum()
    {
        header('Location: ' . $this->config['url']);
        die();
    }

    private function createPassword($username)
    {
        return hash('sha256', $username . $this->config['password_token']);
    }

    private function getToken($username, $password)
    {
        $data = [
            'identification' => $username,
            'password' => $password,
            'lifetime' => $this->getLifetimeInSeconds(),
        ];

        $response = $this->sendPostRequest('/api/token', $data);

        //die(var_dump($response));

        return isset($response['token']) ? $response['token'] : '';
    }

    public function signup($username, $password, $email)
    {
        $data = [
            "data" => [
                "type" => "users",
                "attributes" => [
                    "username" => $username,
                    "password" => $password,
                    "email" => $email,
                    "isActivated" => true,
                ]
            ]
        ];

        $response = $this->sendPostRequest('/api/users', $data);

        //dd($response);

        //$act = $this->activate($response['data']['id']);

        return $response['data']['id'];
    }

    private function sendPostRequest($path, $data)
    {
        $data_string = json_encode($data);

        $ch = curl_init($this->config['url'] . $path);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string),
                'Authorization: Token ' . $this->config['api_key'] . '; userId=1',
            ]
        );
        $result = curl_exec($ch);

        return json_decode($result, true);
    }

    private function activate($id)
    {

        $path = '/api/users/'.$id;

        $data = [
            "data" => [
                'attributes' => [
                  "isActivated" => true
                ]
            ]
        ];

        return $this->sendPostRequest($path, $data);

    }

    private function setRememberMeCookie($token)
    {
        $this->setCookie(self::REMEMBER_ME_KEY, $token, time() + $this->getLifetimeInSeconds());
    }

    private function removeRememberMeCookie()
    {
        unset($_COOKIE[self::REMEMBER_ME_KEY]);
        $this->setCookie(self::REMEMBER_ME_KEY, '', time() - 10);
    }

    private function setCookie($key, $token, $time)
    {
        setcookie($key, $token, $time, '/', $this->config['root_domain']);
    }

    private function getLifetimeInSeconds()
    {
        return $this->config['lifetime_in_days'] * 60 * 60 * 24;
    }

}