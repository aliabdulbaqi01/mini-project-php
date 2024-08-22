<?php


// include
/*
 * include here make it easy to write you code and make it dynamic
 * I use @ in case the file not exist so no errors will appeared
 */

// header.inc.php
/*
 * why using inc
 *      - just to know that this file cannot work a lone it's part i can add it to any
 *      - but note that whatever value passed here it should exist before include this file
 *       -so the header file could see it or an error will show.
 */

// the path
/*
 * the path here should be related to the file that will exist not to the header
 *  how
 *      - act with include as a part of the page that exist in the page
 *      - which mean if it in included in multiple files each file should have path to file location
 *      - not the path depending on the header location
 *
 */