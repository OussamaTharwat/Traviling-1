<?php

namespace Modules\ContactUs\Services;

use Modules\ContactUs\Models\ContactSetting;

class ContactSettingService
{
      public function __construct(private ContactSetting $contactSettingModel) {}

    public function get()
    {
        return $this->contactSettingModel::first();
    }

    public function update(array $data)
    {
        $contactSetting = $this->contactSettingModel::first();
        if ($contactSetting) {
            $contactSetting->update($data);
        } else {
            $contactSetting = $this->contactSettingModel::create($data);
        }
        return $contactSetting;
    }
}
