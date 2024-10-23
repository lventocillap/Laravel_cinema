<?php

declare(strict_types=1);

namespace Src\Profile\Infrastructure\Persistence;

use App\Models\Profile as AppProfile;
use Exception;
use Illuminate\Support\Facades\Auth;
use Src\Profile\Domain\Interface\ProfileInterface;
use Src\Profile\Domain\Model\Profile;
use Symfony\Component\Translation\Provider\ProviderInterface;

class ProfileEloquentPersistence implements ProfileInterface
{
    public function verificateProfile(string $documentNumber): string|bool
    {
        $userId = Auth::user()->id;
        $user = AppProfile::where('document_number', $documentNumber)->where('user_id', $userId)->exists();
        $profile = AppProfile::where('document_number', $documentNumber)->where('user_id', null)->exists();
        if ($user) {
            return true;
        } elseif (!$profile) {
            return false;
        } else {
            return 'none';
        }
    }
    public function storeProfileIndependent(string $documentNumber, string $cellphone, string $emailVerification, string $name): Profile
    {
        $profile = AppProfile::create([
            'document_number' => $documentNumber,
            'cellphone' => $cellphone,
            'email_verification' => $emailVerification,
            'name' => $name
        ]);
        return new Profile(
            $profile->id,
            null,
            $profile->document_number,
            $profile->cellphone,
            $profile->email_verification,
            $profile->name
        );
    }
    public function getIdProfile(string $documentNumber): Profile
    {
        $profile = AppProfile::where('document_number', $documentNumber)->first();
        return new Profile(
            $profile->id,
            null,
            $profile->document_number,
            $profile->cellphone,
            $profile->email_verification,
            $profile->name
        );
    }
    public function getIdProfileAuthentificate(string $documentNumber): Profile
    {
        $userId = Auth::user()->id;
        $profile = AppProfile::where('document_number',$documentNumber)->where('user_id',$userId)->first();
        return new Profile(
            $profile->id,
            null,
            $profile->document_number,
            $profile->cellphone,
            $profile->email_verification,
            $profile->name
        );
    }
}
