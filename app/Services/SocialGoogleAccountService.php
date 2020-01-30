<?php
namespace App\Services;
use App\SocialGoogleAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;
class SocialGoogleAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialGoogleAccount::whereProvider('google')
                    ->whereProviderUserId($providerUser->getId())
                    ->first();
        // console.log($account);
        $user = User::whereEmail($providerUser->getEmail())->first();

        // if ($account) {
        //     return $account->user;
        // }

        if (!$account) {
            $account = new SocialGoogleAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'google'
            ]);
            // $account->save();
        }

        $user = User::whereEmail($providerUser->getEmail())->first();
        if ($user) {
            $user->name = $providerUser->getName();
            $user->avatar = $providerUser->getAvatar();
            $user->password = md5(rand(1,10000));
            $user->touch();
            $user->save();
            $account->user()->associate($user);
            $account->save();
            return $user;
            // $user = User::create([
                //     'email' => $providerUser->getEmail(),
                //     'name' => $providerUser->getName(),
                //     'password' => md5(rand(1,10000)),
                //     'avatar' => $providerUser->getAvatar(),
                // ]);
        } else {
            $user = 'DENIED';
            return $user;
        }
    }
}
