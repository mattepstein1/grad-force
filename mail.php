<?php
function makeGoogleCalendar($eventName, $startDate, $endDate, $title, $description, $address, $timezone){
    // Get your start & end date
    // The start and end date below are Carbon objects

    // Set your timezone if it is set
    if ($timezone) {
        $startDate = $startDate->setTimezone($timezone);
        $endDate = $endDate->setTimezone($timezone);
    }

    // Create the full calendar link
    $queryString = sprintf(
        'action=%s&text=%s&details=%s&location=%s&dates=%s/%s&ctz=%s',
        // action
        'TEMPLATE',
        // text
        urlencode($title),
        // details
        urlencode(strip_tags($description)),
        // location
        urlencode($address),
        // dates
        urlencode($startDate->format("Ymd\THis")),
        urlencode($endDate->format("Ymd\THis")),
        // ctz
        urlencode($startDate->timezoneName)
    );

    return 'https://www.google.com/calendar/event?' . $queryString;
}
$datetime = strtotime($_POST['datetime']);
$data = [
    'start_date' => date('Y-m-d\TH:i:s-00:00', $datetime),
    'end_date' => date('Y-m-d\TH:i:s-00:00', $datetime+3600),
    'event_name' => 'interview',
    'title' => 'job interview',
    'description' => 'Job Interview',
    'address' => 'Auckland',
    'time_zone' => 'Pacific/Auckland'
];

$url = makeGoogleCalendar($data['event_name'], new DateTime($data['start_date']), new DateTime($data['end_date']), $data['title'], $data['description'], $data['address'], new DateTimeZone($data['time_zone']));
$data['url'] = $url;
$time = date('Y-m-d H:i:s', $datetime);
$to = $_POST['email'];         // Mail reciver
$subject = "Job Interview Confirmation";                // Subject
$link = 'http://gradforce.xyz/planb/remind.php?data='.urlencode(json_encode($data));
$message = "Hello<br>This is your job interview confirmation, Your interview date is $time<br>if you can attend the interview, pleas click the link below<br> <a href='$link'>$link</a>";  // mail
$from = "gradforce.interview@gmail.com";   // Mail senter
// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = "To: You <$to>";
$headers[] = "From: Gradforce.Admin <$from>";
mail($to,$subject,$message,implode("\r\n", $headers));
echo "Email sent!!!";