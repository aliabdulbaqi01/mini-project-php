<?php

const FLASH = 'FLASH_MESSAGES';

const FLASH_ERROR = 'error';
const FLASH_WARNING = 'warning';
const FLASH_INFO = 'info';
const FLASH_SUCCESS = 'success';


/*
 * CREATE flash message
 */
function create_flash_message(string $name,string $message, string $type = 'success') {
    // remove existing message with the name
    if(isset($_SESSION[FLASH][$name])) {
        unset($_SESSION[FLASH][$name]);
    }
    // add the message to the session
    $_SESSION[FLASH][$name] = ['message' => $message, 'type' => $type];
}

/*
*   format the flash message
*/
function format_flash_message(array $message) {
    return sprintf('<div class="alert alert-%s">%s</div>', $message['type'], $message['message']);
}


/*
* display flash message
*/
function display_flash_message(string $message) {
    if(!isset($_SESSION[FLASH][$message])) {
        return;
    }
    // get message from teh session
    $flash_message = $_SESSION[FLASH][$message];

    // delete the flash message
    unset($_SESSION[FLASH][$message]);

    // display the flash message
    echo format_flash_message($flash_message);
}


/*
 *  display all flash message
 */
function display_all_flash_messages(): void
{
    if (!isset($_SESSION[FLASH])) {
        return;
    }

    // get flash messages
    $flash_messages = $_SESSION[FLASH];

    // remove all the flash messages
    unset($_SESSION[FLASH]);

    // show all flash messages
    foreach ($flash_messages as $flash_message) {
        echo format_flash_message($flash_message);
    }
}


/*
 * flash message
 */
function flash(string $name = '', string $message = '', string $type = ''): void
{
    if ($name !== '' && $message !== '' && $type !== '') {
        // create a flash message
        create_flash_message($name, $message, $type);
    } elseif ($name !== '' && $message === '' && $type === '') {
        // display a flash message
        display_flash_message($name);
    } elseif ($name === '' && $message === '' && $type === '') {
        // display all flash message
        display_all_flash_messages();
    }
}
