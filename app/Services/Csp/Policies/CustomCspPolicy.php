<?php
namespace App\Services\Csp\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class CustomCspPolicy extends Basic
{
    public function configure()
    {
        parent::configure();

        $this->addDirective(Directive::SCRIPT, 'self');
        $this->addDirective(Directive::STYLE, 'self');
        $this->addNonceForDirective(Directive::DEFAULT);
        $this->addDirective(Directive::FRAME, 'https://*.youtube.com');
    }
}