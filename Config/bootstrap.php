<?php
        Croogo::hookHelper('Nodes', 'Texy.Texy');

        CroogoNav::add('extensions.children.texy', array(
            'title' => 'Texy',
            'url' => '#',
            'children' => array(
                'settings' => array(
                    'title' => __('Configure'),
                    'url' => array('plugin' => '', 'controller' => 'settings', 'action' => 'prefix', 'Texy')
                )
            )
        ));        
?>