<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Login Verification Code</title>
</head>

<body style="font-family: Arial, sans-serif; padding: 20px; background-color: #f7f7f7; margin: 0;">
  <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
    <div style="text-align: center; padding: 20px 0;">
      <h1 style="color: #3662e3; margin: 0;">Verification Code</h1>
    </div>

    <div style="padding: 20px; border-top: 1px solid #eee;">
      <p style="margin-bottom: 20px;">To complete your login, please enter the following verification code:</p>

      <div style="background-color: #f8f9fa; padding: 15px; text-align: center; border-radius: 5px; margin: 20px 0;">
        <span style="font-size: 32px; font-weight: bold; color: #3662e3; letter-spacing: 5px;">{{ $code }}</span>
      </div>

      <p style="margin-top: 20px; color: #666;">This code will expire in 10 minutes.</p>

      <div style="margin-top: 30px; padding: 15px; background-color: #fff4f4; border-left: 4px solid #dc3545; margin-bottom: 20px;">
        <p style="margin: 0; color: #dc3545; font-size: 14px;">
          <strong>Security Notice:</strong><br>
          Never share this code with anyone. Imagine Shirt staff will never ask for this code.
        </p>
      </div>
    </div>

    <div style="text-align: center; padding-top: 20px; border-top: 1px solid #eee; color: #666; font-size: 12px;">
      <p>This is an automated message from Imagine Shirt</p>
      <p>&copy; {{ date('Y') }} Imagine Shirt. All rights reserved.</p>
    </div>
  </div>
</body>

</html>