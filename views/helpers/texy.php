<?php
/**
 * Texy helper
 *
 * Helper class for Texy plugin.
 *
 * @package  Croogo
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
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