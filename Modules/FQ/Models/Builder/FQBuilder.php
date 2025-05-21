<?php

namespace Modules\FQ\Models\Builder;
use Illuminate\Database\Eloquent\Builder;

class FQBuilder extends Builder
{
    public function adminDetails()
    {
        return $this->select([
            'id',
            'question',
            'answer',
        ]);
    }

}
