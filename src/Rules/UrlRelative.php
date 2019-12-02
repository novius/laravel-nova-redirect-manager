<?php

namespace Novius\LaravelNovaRedirectManager\Rules;

class UrlRelative extends UrlAbsoluteOrRelative
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->validateRelativeUrl($attribute, $value);
    }
}
