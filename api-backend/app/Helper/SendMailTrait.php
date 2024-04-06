<?php

namespace App\Helper;

use App\Jobs\SendUserForgotPasswordJob;
use App\Jobs\SendUserInfoJob;

trait SendMailTrait
{
    public function callSendUserInfoMail(array $data): void
    {
        dispatch(new SendUserInfoJob($data));
    }

    public function callSendUserForgotPasswordMail(array $data): void
    {
        dispatch(new SendUserForgotPasswordJob($data));
    }
}
