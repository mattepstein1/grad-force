<?php
require __DIR__ . '/vendor/autoload.php';


/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Google Calendar API PHP Quickstart');
    $client->setScopes(Google_Service_Calendar::CALENDAR);
    $client->setAuthConfig('./config/credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
    $tokenPath = './token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    // If there is no previous token or it's expired.
    if ($client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            if (php_sapi_name() != 'cli') {
                throw new Exception('This application must be run on the command line.');
            }
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);
            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));

            // Exchange authorization code for an access token.
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);

            // Check to see if there was an error.
            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
        }
        // Save the token to a file.
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    return $client;
}

$data = json_decode(urldecode($_GET['data']), true);
// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Calendar($client);
$event = new Google_Service_Calendar_Event(array(
    'summary' => $data['event_name'],
    'location' => $data['address'],
    'description' => $data['description'],
    'start' => array(
        'dateTime' => $data['start_date'],
        'timeZone' => 'Pacific/Auckland',
      ),
      'end' => array(
        'dateTime' => $data['end_date'],
        'timeZone' => 'Pacific/Auckland',
      ),
    'recurrence' => array(
      'RRULE:FREQ=DAILY;COUNT=1'
    ),
    'attendees' => array(
    ),
    'reminders' => array(
      'useDefault' => FALSE,
      'overrides' => array(
        array('method' => 'email', 'minutes' => 24 * 60),
        array('method' => 'popup', 'minutes' => 10),
      ),
    ),
  ));
  
  $calendarId = 'primary';
  $event = $service->events->insert($calendarId, $event);
  // printf('Event created: %s\n', $event->htmlLink);
  // exit;
header('Location: '.$data['url']);