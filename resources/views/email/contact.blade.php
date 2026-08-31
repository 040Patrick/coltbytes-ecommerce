<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Us</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f5f5f0; font-family: Arial, sans-serif;">

    <div style="max-width: 600px; margin: 40px auto; padding: 30px; background-color: #ffffff; border-radius: 10px;">

        <h1 style="margin-top: 0; color: #222;">
            New Contact Message from: {{ $data['name'] }}
        </h1>

        <p style="color: #555;">
            You received a new message through the contact form.
        </p>

        <div style="margin-top: 25px;">

            <p>
                <strong>Subject:</strong>
                {{ $data['subject'] }}
            </p>

            <p>
                <strong>Email:</strong>
                {{ $data['email'] }}
            </p>

        </div>

        <div style="margin-top: 25px; padding: 20px; background-color: #f8f8f5; border-radius: 8px;">

            <h3 style="margin-top: 0;">
                Message
            </h3>

            <p style="margin-bottom: 0; white-space: pre-line;">
                {{ $data['message'] }}
            </p>

        </div>

        <p style="margin-top: 30px; font-size: 12px; color: #888;">
            This message was sent through the contact form.
        </p>

    </div>

</body>
</html>