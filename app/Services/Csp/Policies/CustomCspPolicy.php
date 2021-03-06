<?php
namespace App\Services\Csp\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Keyword;
use Spatie\Csp\Policies\Basic;

class CustomCspPolicy extends Basic
{
    public function configure()
    {
        parent::configure();

        $this->addDirective(Directive::SCRIPT, [
            Keyword::SELF,
            Keyword::UNSAFE_INLINE
        ]);
        $this->addDirective(Directive::STYLE, [
            Keyword::SELF, 
            Keyword::UNSAFE_INLINE
        ]);
        $this->addDirective(Directive::IMG, Keyword::SELF);
        $this->addDirective(Directive::FONT, Keyword::SELF);
        $this->addDirective(Directive::CONNECT, Keyword::SELF);
        $this->addNonceForDirective(Directive::DEFAULT);
        $this->addDirective(Directive::FRAME, 'https://*.youtube.com');
    }
}