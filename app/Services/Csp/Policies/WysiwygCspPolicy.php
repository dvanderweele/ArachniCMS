<?php
namespace App\Services\Csp\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Keyword;
use Spatie\Csp\Policies\Policy;

class WysiwygCspPolicy extends Policy
{
    public function configure()
    {

        $this->addDirective(Directive::SCRIPT, [
            Keyword::SELF,
            Keyword::UNSAFE_INLINE
        ]);
        $this->addDirective(Directive::STYLE, [
            Keyword::SELF, 
            Keyword::UNSAFE_INLINE
        ]);
        $this->addDirective(Directive::IMG, 'self data: blob:');
        $this->addDirective(Directive::FONT, Keyword::SELF);
        $this->addDirective(Directive::CONNECT, 'self blob:');
        $this->addNonceForDirective(Directive::DEFAULT);
        $this->addDirective(Directive::FRAME, 'https://*.youtube.com');
    }
}