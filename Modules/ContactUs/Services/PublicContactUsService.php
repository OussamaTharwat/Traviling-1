<?php

namespace Modules\ContactUs\Services;

use Modules\ContactUs\Models\ContactUs;

readonly class PublicContactUsService
{
    public function __construct(private ContactUs $contactUsModel) {}

    public function store(array $data)
    {
         if (isset($data['url'])) {
            unset($data['url']);
        }
        $this->contactUsModel::create($data);
        // $this->notifySendNotes(AdminHelper::getMainAdmin(),$data);
    }


    // private function notifySendNotes($user,$model)
    // {
    //     Notification::send($user, new FcmNotification(
    //         'send_message_to_user_admin_title',
    //         'send_message_to_user_admin_body',
    //         additionalData: [
    //             'model_id' => $model,
    //         ]
    //     ));
    // }
}
