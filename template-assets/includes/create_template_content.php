<?php
/**
 * Created by PhpStorm.
 * User: Maryam Khan
 * Date: 4/12/2019
 * Time: 1:08 PM
 * Filename: create_template_content.php
 *
 * Gets a JSON-encoded object that contains the following functionality:
 *  1. JavaScript: loads the data from template_select_content.php into div #template_select_area;
 *                  loads the data from template_body_content.php into div #template_body_area
 *  2. HTML: creates the 'skeleton' of the template editor page: an area for the template selection list to go in,
 *              an area for the template body to go in,
 *              an area for the template tags to go in, and
 *              Save and Delete buttons
 *  3. CSS: defines the styling properties of the HTML
 */

require_once('LoadableContent.php');
session_start();

$js = <<<JS
$(
    function() {
        // loads the content from template_select_content.php
        loadContent(
            "template-assets/includes/template_select_content.php", 
            function() {
                // calls loadTemplateNames function in template_select_content.php
                loadTemplateNames();
            },
            // assigns HTML generated by template_select_content.php to div #template_select_area
            "#template_select_area"
        );
        // loads the content from template_name_content.php
        loadContent(
            "template-assets/includes/template_name_content.php", 
            function() {
            },
            // assigns HTML generated by template_name_content.php to div #template_name_area
            "#template_name_area"
        );
        // loads the content from template_body_content.php
        loadContent(
            "template-assets/includes/template_body_content.php", 
            function() {
                
            },
            // assigns HTML generated by template_body_content.php to div #template_body_area
            "#template_body_area"
        );
        loadContent(
            "template-assets/includes/template_tags_content.php", 
            function() {
                
            },
            // assigns HTML generated by template_tags_content.php to div #template_tags_area
            "#template_tags_area"
        );
        
        loadContent(
            "template-assets/includes/template_buttons_content.php", 
            function() {
                
            },
            // assigns HTML generated by template_buttons_content.php to div #template_buttons_area
            "#template_buttons_area"
        );
        
    }
);




JS;

$html = <<<HTML
<div class="container">
    <h2 class="text-center">Template Editor</h2>
    <div class="row">
        <div class="input-group mb-3 col" id="template_select_area">
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-3 col" id="template_name_area">
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-3 col" id="template_body_area">
        </div>
    </div>

    <div class="row">
        <div class="input-group mb-3 col" id="template_tags_area">
        </div>
    </div>
    <div class="row">
        <div class="input-group mb-3 col" id="template_buttons_area">
        </div>
    </div>
</div>
HTML;

$css = <<<CSS
.container {
    margin-top: 10px;
}
CSS;

$obj = new LoadableContent($js, $html, $css);
$obj->load();