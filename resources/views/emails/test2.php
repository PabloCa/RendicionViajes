<?php
# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('key-ebc266a3344c7d6edb978b3a23b9e59c');
$domain = "sandboxea0eaad83aba42d3ad5771f7f97fe260.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
    array('from'    => 'Mailgun Sandbox <postmaster@sandboxea0eaad83aba42d3ad5771f7f97fe260.mailgun.org>',
        'to'      => 'Pablo <rendicionviajes@gmail.com>',
        'subject' => 'Hello Pablo',
        'text'    => 'Congratulations Pablo, you just sent an email with Mailgun!  You are truly awesome!  You can see a record of this email in your logs: https://mailgun.com/cp/log .  You can send up to 300 emails/day from this sandbox server.  Next, you should add your own domain so you can send 10,000 emails/month for free.'));
