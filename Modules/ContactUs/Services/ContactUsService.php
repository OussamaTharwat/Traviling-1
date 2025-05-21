<?php

namespace Modules\ContactUs\Services;

use Modules\ContactUs\Models\ContactUs;

readonly class ContactUsService
{
    public function __construct(private ContactUs $contactUsModel) {}

    public function index()
    {
        return $this->contactUsModel::query()
            ->latest()
            ->searchable(['name'])
            ->paginatedCollection();
    }

    public function show($id)
    {
        return $this->contactUsModel::query()->findOrFail($id);
    }

    public function store(array $data)
    {
        return $this->contactUsModel::create($data);
    }

    public function update($id, array $data)
    {
        $contactUs = $this->contactUsModel::findOrFail($id);
        $contactUs->update($data);
        return $contactUs;
    }

    public function destroy($id)
    {
        $this->contactUsModel::query()->findOrFail($id)->delete();
    }
}
