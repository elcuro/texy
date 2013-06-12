<?php
/**
 * Texy Activation
 *
 * Activation class for Texy plugin.
 *
 * @package  Croogo
 * @author Juraj Jancuska <jjancuska@gmail.com>
 * @license  GNU GENERAL PUBLIC LICENSE version 2 or 3
 * (GPL because Texy code is on GPL)
 */
class TexyActivation {

        /**
         * Before onActivation
         *
         * @param object $controller
         * @return boolean
         */
        public function beforeActivation(&$controller) {
                return true;
        }

        /**
         * Activation of texy plugin
         *
         * @param object $controller
         * @return void
         */
        public function onActivation(&$controller) {
                // write default setting
                $controller->Setting->write('Texy.headingModuleTop', '3', array(
                    'editable' => 1, 'description' => __('Level of higher title, e.g. 3 = h3', true))
                );
                $controller->Setting->write('Texy.imageModuleRoot', '/img/', array(
                    'editable' => 1, 'description' => __('Realtive path to your images', true)));
                $controller->Setting->write('Texy.convertFields', 'body', array(
                    'editable' => 1, 'description' => __('Coma separated node fields to convert e.g. body,excerpt', true)));
        }

        /**
         * Before onDeactivation
         *
         * @param object $controller
         * @return boolean
         */
        public function beforeDeactivation(&$controller) {
                return true;
        }

        /**
         * Deactivation of texy plugin
         *
         * @param object $controller
         * @return void
         */
        public function onDeactivation(&$controller) {
                // delete config
                $controller->Setting->deleteKey('Texy.headingModuleTop');
                $controller->Setting->deleteKey('Texy.imageModuleRoot');
                $controller->Setting->deleteKey('Texy.convertFields');
        }
}
?>