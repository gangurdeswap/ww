<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" />
        <title>Enyota</title>
        <style type="text/css">
            * {
                -ms-text-size-adjust:100%;
                -webkit-text-size-adjust:none;
                -webkit-text-resize:100%;
                text-resize:100%;
                font-family: 'Roboto', sans-serif !important;
                color:#36393f;
            }
            a{outline:none; }
            table{ border: 0px; border-collapse: collapse;   border-spacing: 0; }
            table, caption, tbody, tfoot, thead, tr, th, td {
                margin: 0;
                padding: 0;
                border: 0;
                font-size: 100%;
                font: inherit;
                vertical-align: baseline;
            }
            .logo img{ mso-width-alt: 260px; width: 260px; }
            @media (max-width: 520px) {
                .lrtd1{ width: 100% !important; display: block !important;}
                .logo{ width: 100% !important;  display: block !important;}
                .lrtd2{width: 100% !important; text-align: left; display: block !important; }
                /*/			table td{ display: block !important;  }	/*/
                .fixtbl{ width: auto !important; }
                .logoheight{ height: 50px !important; }
            }

            .btn{
                mso-padding-alt: 5px 10px !important;
                padding: 5px 10px !important;
            }

            .im {
                color: #525252 !important;
            }

        </style>

        <!--[if mso]>
                <style>
                        .logomain{ width: 260px !important; }
                        .footlogo{ width: 180px !important; }
                        .mainbanner{ max-width: 100% !important; height:auto !important; }
                        @media(max-width: 520px){
                          .logomain{ width: 260px !important; }
                          .footlogo{ width: 180px !important; }
                          .mainbanner{ width: 520px; }
                        }
                        .btn{ display:none !important;}
            </style>
        <![endif]-->

    </head>
    <body style="margin:0px; padding:0px; background-color:#fff; font-family: 'Roboto', 'Segoe UI', sans-serif; font-size:14px">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td>
                        <table cellspacing="0" cellpadding="0" class="fixtbl logoheight" style=" width:100%; height: 88px; margin: 0px auto" border="0">
                            <tbody>

                                <tr>
                                    <td class="logo" style="text-align:center; vertical-align: middle">
                                        <img style="margin: 0px auto;" class="logomain" src="{{ $message->embed(asset('img/logo_new.png')) }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height: 30px;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="background: #f0f0f0;">
                        <table cellspacing="0" cellpadding="0" class="fixtbl" style=" width:600px; background: #f0f0f0; margin: 0px auto" border="0">
                            <tbody>
                                <tr>
                                    <td colspan="3" style="height: 30px;"> </td>
                                </tr>
                                <tr>
                                    <td class="noblock" style="width: 20px"></td>
                                    <td style="width: 260px; vertical-align: middle; color: #525252;">
                                        <table cellspacing="0" cellpadding="0" style="width: 100%;color: #525252 !important;">
                                            <tr style="color: #525252 !important;">
                                                <td ><?php echo date("j<\s\up>S</\s\up> F Y"); ?>
                                                    <br />
                                                    <br />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: left;color: #525252 !important;"><b>Dear user,</b>
                                                    <br />
                                                    <br />
                                                </td>
                                            </tr>
                                        </table>
                                        <div style="color: #525252 !important;">
                                            {!!$reply_text!!}
                                            <br/>
                                        </div>
                                        <div style="color: #525252 !important;">
                                            <br />
                                            <span style="line-height: 26px;"> Kind regards,</span><br />
                                            {{env('APP_NAME')}}

                                        </div>
                                    </td>
                                    <td style="width: 20px;"></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="height: 30px;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-top: 6px solid #1b365d; background-color: #e6e2e7;">
                        <table cellspacing="0" cellpadding="0" class="fixtbl" style=" width:600px; background: #e6e2e7; margin: 0px auto" border="0">
                            <tbody>
                                <tr>
                                    <td height="30px" style="height: 30px;"><br /><br /></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; color: #525252;">
                                        <img src="{{ $message->embed(asset('img/logo_new.png')) }}" class="footlogo" style="width: 180px;">
                                            <br/>
                                            Tel:  {{env('EMAIL_NUMBER')}}<br/>
                                            {{env('EMAIL_ADDRESS_LINE_1')}}<br/>
                                            {{env('EMAIL_ADDRESS_LINE_2')}}<br/>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="30px" style="height: 30px;"><br /><br /></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>