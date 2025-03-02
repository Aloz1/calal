<?php

namespace Aloz1\Calal;

class CalalEventWidget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'calal_events',
            'Calal Upcoming Events',
        );
    }

    private function dummy_events() {
        return array(
            array('name' => 'Event 1', 'href' => '#', 'date' => 'Sunday 27th February 2025'),
            array('name' => 'Event 2', 'href' => '#', 'date' => 'Tuesday 8th March 2025')
        );
    }

    public function widget($args, $instance) {
        // Get calendar events
        // TODO: Replace dumy data with actual fetch
        $events = $this->dummy_events();

        View::render('events_widget/widget', array('args' => $args, 'events' => $events));
    }

    public function form($instance) {
        // Options:
        // n = Number of Events
        // d = Restrict future events to d days in the future
        // c = Select calendars A/B/C to show
        $defaults = array(
            'num_events' => 3,
            'restrict_days' => 90,
//            'calendars' => CalalCalendar::fetch()
        );

        $instance = array_replace($defaults, $instance);
        View::render('events_widget/form', array('this' => $this, 'instance' => $instance))->echo();
    }

    public function update($old_instance, $new_instance) {
        $instance = $old_instance;
        // TODO: SANITIZE
        return $old_isntance
    }
}
