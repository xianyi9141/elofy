INSERT INTO `ttl_email_templates` (`id`, `name`, `subject`, `action`, `constants`, `body`, `created_at`, `updated_at`) VALUES (NULL, 'User email updated', 'Hello ({USER_NAME}) your email updated', 'user_email_updated', '{USER_NAME},{LINK}', '<p style="font-size:16px; font-weight:bold; font-family:arial; color:#000; text-align: center;">Olá, {USER_NAME}</p>
                                <p style="font-size:16px; font-weight:bold; font-family:arial; color:#000; text-align:center; margin:0 auto 30px;">Email updated</p>
    <p style="font-size:12px; font-family:arial; color:#333; text-align:center; margin:0 auto 25px;padding: 0 30px; line-height: 20px;">Your email account is updated. Please click the below link to confirm the same. If you dont want to performed this activity please ignore this email.</p>

                                <a href="{LINK}" style="background: #03a9f4; border: 15px solid #03a9f4; font-family: sans-serif; font-size: 16px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 5px; font-weight: bold; width:200px; margin: 0 auto;" class="button-a"><span style="color:#ffffff;" class="button-link">&nbsp;&nbsp;&nbsp;&nbsp;Click to confirm&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
                                <br>', '2014-09-02 00:00:00', '2015-12-24 16:25:46');