/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you require will output into a single css file (app.css in this case)
import '../css/app.css';

/**
 * JQUERY
 * this loads jquery, but does *not* set a global $ or jQuery variable
 */
import $ from 'jquery';

/**
 * BOOTSTRAP JS
 * Bootstrap's JavaScript adds functions to jQuery
 */
import 'bootstrap'; // 
// uncomment if you have legacy code that needs global variables
//global.$ = $;

/**
 * PERSONNAL JS
 */
import getNiceMessage from './get_nice_message';
console.log(getNiceMessage(5));
$('.dropdown-toggle').dropdown();
$('.custom-file-input').on('change', function(event) {
    var inputFile = event.currentTarget;
    $(inputFile).parent()
        .find('.custom-file-label')
        .html(inputFile.files[0].name);
});