Programmable Voice: Quickstart Application Server - PHP
===
This repository contains the server-side web application required to run the [Twilio Programmable Voice iOS SDK Quickstart](https://www.twilio.com/docs/api/voice-sdk/ios/getting-started) and [Android SDK Quickstart](https://www.twilio.com/docs/api/voice-sdk/android/getting-started) mobile sample apps, written in PHP.

Looking for the Quickstart mobile app?
---
Download the client-side Quickstart Applications in Swift and iOS here:

- [Swift Quickstart Mobile App](https://github.com/twilio/voice-quickstart-swift)
- [Objective-C Quickstart Mobile App](https://github.com/twilio/voice-quickstart-objc)

Download the client-side Quickstart Application for Android here:

- [Android Quickstart Mobile App](https://github.com/twilio/voice-quickstart-android)

Prerequisites
---
* A Twilio Account. Don't have one? [Sign up](https://www.twilio.com/try-twilio) for free!
* Follow the [iOS full quickstart tutorial here](https://www.twilio.com/docs/api/voice-sdk/ios/getting-started) or [Android full quickstart tutorial here](https://www.twilio.com/docs/api/voice-sdk/android/getting-started).

Setting up the PHP Application
---
Create a configuration file for your application:

```bash
cp config.example.php config.php
```

Edit `config.php` with your Twilio credentials.

Next, we'll need to install the Twilio Helper library via [Composer](https://getcomposer.org/).

```bash
composer install
```

Now we should be all set! Run the application using the `php -S` command.

```bash
php -S 127.0.0.1:5000
```

To generate an Access Token, visit [http://localhost:5000?identity=alice](http://localhost:5000?identity=alice).

Up and running
---
This web application needs to be accessbile on the public internet in order to receive webhook requests from Twilio. [Ngrok](https://ngrok.com/) is a great options for getting this done quickly.

Once you have the application running locally, in a separate terminal window, make your server available to the public internet with the following:

```bash
ngrok http 5000
```

You should see a dynamically generated public Ngrok URL in the command window. Ngrok will now tunnel all HTTP traffic directed at this URL to your local machine at port 5000.

License
---
MIT