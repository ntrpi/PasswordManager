<?php
//File created by Wafa 04/2021

//get all users drop down
function userDropdown($recipients, $select = ""){
    $html_usersdropdown = "";
    foreach ($recipients as $recipient) {
        $selected = $select == $recipient->user_id ? "selected" : "";
        $html_usersdropdown .= "<option $selected value='$recipient->user_id'>$recipient->first_name</option>";
    }

    return $html_usersdropdown;
}

//get all url dropdown

function urlDropdown($urls, $select = ""){
    $html_urlsdropdown = "";
    foreach ($urls as $url) {
        $selected = $select == $url->url_id ? "selected" : "";
        $html_urlsdropdown .= "<option $selected value='$url->url_id'>$url->url</option>";
    }

    return $html_urlsdropdown;
}

//get all users <--this will be replaced by an if block in the above two fuction to check for logged in user

function ownerDropdown($owners, $select = ""){
    $html_ownersdropdown = "";
    foreach ($owners as $owner) {
        $selected = $select == $owner->user_id ? "selected" : "";
        $html_ownersdropdown .= "<option $selected value='$owner->user_id'>$owner->user_name</option>";
    }

    return $html_ownersdropdown;
}