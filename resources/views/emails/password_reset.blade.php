<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta name="x-apple-disable-message-reformatting">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="telephone=no" name="format-detection">
  <title></title>
  <!--[if (mso 16)]>
    <style type="text/css">
    a {text-decoration: none;}
    </style>
    <![endif]-->
  <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
  <!--[if gte mso 9]>
<xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG></o:AllowPNG>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
</xml>
<![endif]-->
</head>

<body style="padding:0; margin-top: 0px; margin-bottom: 0px; margin-left: 0px; margin-right: 0px;">
  <div class="emailer-wrapper" style="background: #fafafa;">
    <!--[if gte mso 9]>
      <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
        <v:fill type="tile" color="#fafafa"></v:fill>
      </v:background>
    <![endif]-->
    <table class="main-content" width="100%" style="background: #fafafa; padding-left: 20px; padding-right: 20px; padding-top: 20px; padding-bottom: 20px;margin-top: 0px; margin-bottom: 0px; margin-left: 0px; margin-right: 0px;
    border-spacing: 0px; table-layout: fixed;" cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
          <td>
            <table style="background-color: #ffffff;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
              align="center">
              <tbody>
                <tr>
                  <td class="pt-20 pb-20 pr-20 pl-20" align="center"
                    style="background: #2982de;padding-top: 20px;padding-bottom: 20px;padding-right: 20px;padding-left: 20px;">
                    <div style="display: block;width: 100%;">
                      <a href="https://lettstartdesign.com">
                        <img src="https://lettstartdesign.com/assets/images/logo.png" alt="" width="150">
                      </a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td align="center" style="padding-top: 40px;padding-right: 20px;padding-left: 20px;">
                    <table width="100%" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td align="center">
                            <img src="https://lettstartdesign.com/assets/images/emailer/forgot-image.png" alt=""
                              style="display: block;" width="175">
                          </td>
                        </tr>
                        <tr>
                          <td align="center" class="pb-15" style="padding-top:20px; padding-bottom: 20px;">
                            <h1
                              style="color: #333333; font-size: 20px; margin-top: 0px; margin-bottom: 0px; margin-left: 0px; margin-right: 0px;line-height: 120%; font-size: 18px; font-family: arial, 'helvetica neue', helvetica, sans-serif; font-style: normal; font-weight: normal; ">
                              <strong>FORGOT</strong></h1>
                            <h1
                              style="color: #333333; font-size: 20px; margin-top: 0px; margin-bottom: 0px; margin-left: 0px; margin-right: 0px;line-height: 120%; font-size: 18px; font-family: arial, 'helvetica neue', helvetica, sans-serif; font-style: normal; font-weight: normal; ">
                              <strong>YOUR PASSWORD ?</strong></h1>
                          </td>
                        </tr>
                        <tr>
                          <td align="center" class="pb-20" style="padding-bottom: 20px;">
                            <p
                              style="color: #666666; font-size: 14px;
                            font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif;
                            line-height: 150%; margin-top: 0px; margin-bottom: 5px; margin-left: 0px; margin-right: 0px;">
                              Hi, {{ $data['first_name'] }} {{ $data['last_name'] }}</p>
                            <p
                              style="color: #666666; font-size: 14px;
                            font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif;
                            line-height: 150%; margin-top: 0px; margin-bottom: 0px; margin-left: 0px; margin-right: 0px;">
                              We received a request to reset your password.</p>
                          </td>
                        </tr>
                        <tr>
                          <td align="center" class="pl-20 pr-20 pb-40"
                            style="padding-bottom: 40px; padding-left: 20px; padding-right: 20px;">
                            <p style="color: #666666; font-size: 14px; margin-top: 0px; margin-bottom: 0px; margin-left: 0px; margin-right: 0px;
                            font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif;
                            line-height: 150%;">Use the link below to set up a new password for your account. If you
                              did not request to
                              reset your password, ignore this email and the link will expire on its own.</p>
                          </td>
                        </tr>
                        <tr>
                          <td align="center" class="pl-40 pr-40 pb-40"
                            style="padding-bottom: 40px; padding-left: 40px; padding-right: 40px;">
                            <span class="button-border" style="border-style: solid solid solid solid;
                            border-color: #2982de #2982de #2982de #2982de;
                            background: #2982de;
                            border-width: 2px 2px 2px 2px;
                            display: inline-block;
                            width: auto;">
                              <a href="{{ $data['url'] }}" class="button" target="_blank" style="    border-style: solid;
                              border-color: #2982de;
                              border-width: 15px 20px 15px 20px;
                              display: inline-block;
                              background: #2982de;
                              font-size: 14px;
                              font-family: arial, 'helvetica neue', helvetica, sans-serif;
                              font-weight: bold;
                              font-style: normal;
                              line-height: 120%;
                              color: #ffffff !important;
                              text-decoration: none;
                              width: auto;
                              text-align: center;">Reset Your Password</a>
                            </span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="center" style="padding-top: 10px;">
                    <table style="background-color: #2982de;" class="footer" width="100%" cellspacing="0"
                      cellpadding="0" bgcolor="#3d5ca3">
                      <tbody>
                        <tr>
                          <td class="pt-20 pl-20 pr-20" align="center" style="padding-top: 20px; padding-left: 20px;  padding-right: 20px;">
                            <p style="font-size: 18px; margin-top: 0px; margin-bottom: 0px; margin-left: 0px; margin-right: 0px;
                            font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif;
                            line-height: 150%; color: #ffffff;" class="text-white"><strong>We love hearing from you!</strong>
                            </p>
                          </td>
                        </tr>
                        <tr>
                          <td class="pt-10 pl-20 pr-20 pb-20" align="center" style="padding-top:10px; padding-bottom: 20px; padding-left: 20px; padding-right: 20px;">
                            <p style="color: #ffffff; font-size: 14px; margin-top: 0px; margin-bottom: 0px; margin-left: 0px; margin-right: 0px;
                            font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif;
                            line-height: 150%;" class="text-white">Have any questions? Please check out our
                              <strong><a href="https://lettstartdesign.com" style="font-size: 14px;
                                font-family: arial, 'helvetica neue', helvetica, sans-serif;
                                font-weight: bold;
                                font-style: normal;
                                line-height: 120%;
                                color: #ffffff !important;
                                text-decoration: none;" class="white">contact us</a></strong> page
                              or email us at <stron><a href="mailto:support@lettstartdesign.com"
                                style="font-size: 14px;
                                font-family: arial, 'helvetica neue', helvetica, sans-serif;
                                font-weight: bold;
                                font-style: normal;
                                line-height: 120%;
                                color: #ffffff !important;
                                text-decoration: none;" class="white">support@lettstartdesign.com</a></strong>.
                            </p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</body>

</html>