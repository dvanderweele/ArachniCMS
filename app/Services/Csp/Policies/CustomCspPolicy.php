<?php
namespace App\Services\Csp\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class CustomCspPolicy extends Basic
{
    public function configure()
    {
        parent::configure();
    }
}