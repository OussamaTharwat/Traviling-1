<?php

namespace Modules\Auth\Http\Controllers;

use App\Traits\HttpResponse;
use Exception;
use Google\Service\Drive;
use Google\Client;
use Google\Service\Calendar;
use Google_Client;
use Google_Service;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;
use Modules\Auth\Http\Requests\Login\DashboardLoginRequest;
use Modules\Auth\Http\Requests\Login\MobileLoginRequest;
use Modules\Auth\Services\LoginService;
use Modules\Auth\Transformers\UserResource;
use Modules\Auth\Transformers\WebResource;
use Spatie\GoogleCalendar\Event;


class LoginController extends Controller
{
    use HttpResponse;

    public function __construct(private readonly LoginService $loginService) {}

    public function mobile(MobileLoginRequest $request)
    {
        $user = $this->loginService->mobile($request->validated());
        return $this->okResponse(WebResource::make($user), message: translate_word('logged_in'))->withCookie(Cookie::make(
            'isLoggedIn',
            'true',
            config('session.lifetime'),
            httpOnly: false,
        ));
        return $this->okResponse(WebResource::make($user), message: translate_word('logged_in'));
    }

    public function dashboard(DashboardLoginRequest $request)
    {
        $data = $request->validated();

        $user = $this->loginService->dashboard($data);

        return $this->okResponse(UserResource::make($user), message: translate_word('logged_in'))->withCookie(Cookie::make(
            'isLoggedIn',
            'true',
            config('session.lifetime'),
            httpOnly: false,
        ));
        return $this->okResponse(UserResource::make($user), message: translate_word('logged_in'));
    }
    public function test()
    {
        // create a new event
        // $event = Event::get();

        $keyFilePath = storage_path('app/google-calendar/audit.json');


    //     $client = new Google_Client();
    //     $client->setAuthConfig($keyFilePath);
    //     $client->setRedirectUri('http://audit_station_backend.test');
    //     $client->addScope('https://www.googleapis.com/auth/calendar');
    //     if (!request()->has('code')) {
    //         $authUrl = $client->createAuthUrl();
    //         return redirect($authUrl); // Redirect to Google OAuth
    //     }

    //         // Get the authorization code
    // $authCode = request()->get('code');

    // Store access token and refresh token for the user
    // $authCode = request()->get('code');
    // $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
    // $user = auth()->user();
    // $user->google_access_token = json_encode($accessToken);
    // $user->google_refresh_token = $accessToken['refresh_token'] ?? null; // Optional: Save refresh token
    // $user->save();




$client = new Client();
$client->setAuthConfig(storage_path('app/google-calendar/client_secret.json')); // Path to your credentials JSON
$client->addScope(Calendar::CALENDAR);
$client->setAccessToken('025a4988647734400ad39d4df771ab0c3da697b2a376f9ae5304621c279fbf6f'); // The user's OAuth token

       $event= Event::create([
            'name' => 'A new event',
            'startDateTime' => Carbon::now(),
            'endDateTime' => Carbon::now()->addHour(),
            'title' => 'Test Source Title',
            'url' => 'http://testsource.url',
        ]);



        $event->source = [
            'title' => 'Test Source Title',
            'url' => 'http://testsource.url',
         ];

        dd(Event::get()->first()->start['dateTime'], Event::get()->first()->end['dateTime']);

        return response()->json('s');

        // return view('google.files', compact('files'));


        // $event->name = 'A new event';
        // $event->description = 'Event description';
        // $event->startDateTime = Carbon::now();
        // $event->endDateTime = Carbon::now()->addHour();
        // $event->addAttendee([
        //     'email' => 'msamy10456@gmail.com',
        //     'name' => 'John Doe',
        //     'comment' => 'Lorum ipsum',
        //     'responseStatus' => 'needsAction',
        // ]);
        // $event->addAttendee(['email' => 'anotherEmail@gmail.com']);
        // $event->addMeetLink(); // optionally add a google meet link to the event

        // $event->save();
    }
}
