<?php

namespace Modules\Footer\Services;

use Illuminate\Support\Facades\DB;
use Modules\Footer\Models\Footer;

class FooterService
{
    public function index()
    {
        return Footer::query()
            ->latest()
            ->paginatedCollection();
    }

    public function update(array $data)
    {
        DB::transaction(function () use ($data) {
            $file = Footer::query()->firstOrFail();
            $file->update($data);
        });
    }
}
