<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f4f4; padding: 40px 20px;">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0"
                       style="max-width: 600px; background-color: #ffffff; border-radius: 8px; overflow: hidden;">

                    <tr>
                        <td style="padding: 40px; text-align: center;">

                            <h1 style="margin: 0 0 20px; font-size: 28px; color: #111111;">
                                Welcome, {{ $user->email }}!
                            </h1>

                            <p style="margin: 0 0 20px; font-size: 16px; line-height: 1.6; color: #555555;">
                                We're happy to have you with us.
                            </p>

                            <p style="margin: 0 0 30px; font-size: 16px; line-height: 1.6; color: #555555;">
                                Your account has been successfully created. You can now log in
                                and start using our platform.
                            </p>

                            <a href="{{ route('home') }}"
                               style="display: inline-block; padding: 12px 24px;
                                      background-color: #111111; color: #ffffff;
                                      text-decoration: none; border-radius: 6px;
                                      font-size: 16px;">
                                Get Started
                            </a>

                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 20px 40px; background-color: #f8f8f8; text-align: center;">
                            <p style="margin: 0; font-size: 13px; color: #888888;">
                                Thank you for joining us.
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>