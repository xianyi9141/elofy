UPDATE `elofy_bd2`.`ttl_email_templates` SET `body`='<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width:100%;border-collapse:collapse\">    <tbody>    <tr>        <td valign=\"top\" style=\"padding-top:9px\">            <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width:100%;min-width:100%;border-collapse:collapse\" width=\"100%\">                <tbody><tr>                    <td valign=\"top\" style=\"padding:0px 18px 9px;text-align:center;word-break:break-word;color:#202020;font-family:Helvetica;font-size:16px;line-height:150%\">                        <h1 style=\"text-align:center;display:block;margin:0;padding:0;color:#202020;font-family:Helvetica;font-size:26px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:normal\"><span style=\"font-size:24px\">Oi, {RECEIVER_NAME}. Tudo bem?</span></h1>                    </td>                </tr>                </tbody></table>        </td>    </tr>    </tbody></table><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width:100%;border-collapse:collapse\">    <tbody>    <tr>        <td valign=\"top\" style=\"padding-top:9px\">            <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width:100%;min-width:100%;border-collapse:collapse\" width=\"100%\">                <tbody><tr>                    <td valign=\"top\" style=\"padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px;word-break:break-word;color:#202020;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left\">                        <div style=\"text-align:center\">Você recebeu um check-in de <strong>{USER_ANSWERED_CHECKIN_NAME}</strong>,&nbsp;leia abaixo:</div>                    </td>                </tr>                </tbody></table>        </td>    </tr>    </tbody></table>{QUESTIONS}{GOALS}<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"min-width:100%;border-collapse:collapse\">    <tbody>    <tr>        <td style=\"padding-top:0;padding-right:18px;padding-bottom:18px;padding-left:18px\" valign=\"top\" align=\"center\">            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:separate!important;border-radius:3px;background-color:#e0629a\">                <tbody>                <tr>                    <td align=\"center\" valign=\"middle\" style=\"font-family:Arial;font-size:16px;padding:15px\">                        <a href=\\\"{LINK}\\\" title=\"Quer enviar um check-in?\" style=\"font-weight:bold;letter-spacing:normal;line-height:100%;text-align:center;text-decoration:none;color:#ffffff;display:block\">Quer enviar um check-in?</a>                    </td>                </tr>                </tbody>            </table>        </td>    </tr>    </tbody></table>' WHERE `id`='65';
