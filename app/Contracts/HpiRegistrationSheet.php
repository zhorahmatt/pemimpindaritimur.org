<?php

namespace App\Contracts;

use App\Models\Hpi;

interface HpiRegistrationSheet
{
    public function sync(Hpi $hpi): ?int;
}
