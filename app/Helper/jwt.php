<?php
namespace App\Helper;
use Firebase\JWT\JWT;
class JWTToken
{
    public static function CreateToken($userEmail)
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'jwt_token', //issue token
            'iat' => time(),      //issue_at time
            'expire' => time() * 60 * 60,
            'userEmail' => $userEmail
        ];
        $jwt = JWT::encode($payload, $key, 'HS256');
        return $jwt;
    }

    public static function VerifyToken($token): string
    {
        try {
            $key = env('JWT_KEY');
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            return $decoded->userEmail;
        } catch (\Exception $e) {
            return 'Unauthorized';
        }
    }
}
