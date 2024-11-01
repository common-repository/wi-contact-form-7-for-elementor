<?php
namespace Elementor;

function wi_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'wi-elements',
        [
            'title'  => 'Webinside',
            'icon' => 'font'
        ],
        1
    );
}
add_action('elementor/init','Elementor\wi_elementor_init');



