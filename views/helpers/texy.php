<?php
/**
 * Texy helper
 *
 * Helper class for Texy plugin.
 *
 * @package  Croogo
 * @author Juraj Jancuska <jjancuska@gmail.com>
 * @license  GNU GENERAL PUBLIC LICENSE version 2 or 3
 * (GPL because Texy code is on GPL)
 */
class TexyHelper extends AppHelper {

        /**
         * Texy parser
         *
         * @var $texy object
         */
        public $texy = NULL;

        /**
         * Other cake helpers
         *
         * @var $helpers Array
         */
        public $helpers = array(
            'Layout'
        );

        /**
         * beforeFilter
         * init Texy
         *
         * @return void
         */
        public function beforeRender() {
                if (!isset($this->texy)) {
                        if (!class_exists('Texy')) {
                                App::import('Vendor', 'Texy.Texy');
                                $this->texy = new Texy;
                        }
                }
        }

        /**
         * afterSetNode
         *
         * @return void
         */
        public function afterSetNode() {
                $conf = Configure::read('Texy');
                $convert_fields = explode(',', $conf['convertFields']);
                // configure texy
                $this->texy->headingModule->top = $conf['headingModuleTop'];
                $this->texy->imageModule->root = $conf['imageModuleRoot'];

                if (is_array($convert_fields)) {
                        foreach ($convert_fields as $field) {
                                $field = trim($field);
                                $this->Layout->setNodeField(
                                        $field, $this->texy->process($this->Layout->node($field))
                                );
                        }
                }
        }
 }
 ?>