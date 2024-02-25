<?php

/**
 * Buttons Component
 */

defined('ABSPATH') or die('No script kiddies please!');


function mm_get_button_component()
{
    $x = mm_get_data_website_inc()['handphone-perusahaan-url'];


    //check if the first character start with 08
    $contains = strpos($x, '08');

    if ($contains === false) {
        $phone_url = $x;
    } else {
        $x = substr_replace($x, '62', 0, 1);
        $x = str_replace(' ', '', $x);
        $phone_url = str_replace('-', '', $x);
    }


    $button = array();

    //whatsapp
    $button['whatsapp'] = '<a class="btn borad-5 wa-bg" href="https://wa.me/' . $phone_url . '" target="_blank" rel="noopener" title="Whatsapp">Chat</a>';

    //whatsapp with icon
    $button['whatsapp-icon'] = '<a class="btn borad-5 wa-bg" href="https://wa.me/' . $phone_url . '" target="_blank" rel="noopener" title="Whatsapp"><i class="fab fa-whatsapp"></i>Chat</a>';

    //call
    $button['call'] = '<a class="btn borad-5 call-bg" href="tel:' . $phone_url . '" rel="noopener" title="Phone">Call</a>';

    //call with icon
    $button['call-icon'] = '<a class="btn borad-5 call-bg" href="tel:' . $phone_url . '" rel="noopener" title="Phone"><i class="fas fa-phone"></i>Call</a>';

    //email
    $button['email'] = '<a class="btn borad-5 email-bg" href="mailto:' . mm_get_data_website_inc()['email-perusahaan'] . '" rel="noopener" title="Email" >Email</a>';

    //email with icon
    $button['email-icon'] = '<a class="btn borad-5 email-bg" href="mailto:' . mm_get_data_website_inc()['email-perusahaan'] . '" rel="noopener" title="Email" ><i class="fas fa-envelope"></i>Email</a>';

    return $button;
}
