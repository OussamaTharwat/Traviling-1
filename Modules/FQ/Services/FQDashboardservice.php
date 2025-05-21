<?php

namespace Modules\FQ\Services;

use Modules\FQ\Models\FQ;

class FQDashboardservice
{
    public function index()
    {
        return FQ::query()
            ->latest()
            ->searchable(['question'])
            ->adminDetails()
            ->paginatedCollection();
    }

    public function show($id)
    {
        return FQ::query()
            ->adminDetails()
            ->findOrFail($id);
    }

    public function store(array $data)
    {
        FQ::create($data);
    }

    public function update(array $data, $id)
    {
        $fq = FQ::findOrFail($id);
        $fq->update($data);
    }

    public function destroy($id)
    {
        FQ::findOrFail($id)->delete();
    }
}
