<?php

namespace App\Models\Traits;

use Illuminate\Support\Collection;

trait HasContentAsParagraphs
{
    /**
     * @return Collection
     */
    public function getContentAsParagraphs(): Collection
    {
        return collect(preg_split('#[\r\n]+#', $this->content));
    }

}
