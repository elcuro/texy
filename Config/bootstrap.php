<?php
/**
 * Helper
 *
 * This plugin's Texy helper will be loaded via NodesController.
 */
        Croogo::hookHelper('Nodes', 'Texy.Texy');
/**
 * Admin menu (navigation)
 *
 * This plugin's admin_menu element will be rendered in admin panel under Extensions menu.
 */
        Croogo::hookAdminMenu('Texy');
?>