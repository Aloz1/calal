<?= $args['before_widget'] ?>
<div class="calal-widget-events">
<?php if (count($events) == 0): ?>
    <section class="calal-widget-no-event">No upcoming events</span>
<?php else: ?>
<?php foreach ($events as $event): ?>
    <section class="calal-widget-event">
        <a href="<?= $event->href ?>"><?= $event->name ?></a>
        <span class="calal-widget-date"><?= $event->date ?></span>
    </section>
<?php endforeach; ?>
<?php endif; ?>
</div>
<?= $args['after_widget'] ?>
