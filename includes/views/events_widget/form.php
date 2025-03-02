<p>
    <label for="<?= $this->get_field_id('num_events') ?>"><?= esc_attr('Max num events') ?>:</label>
    <input class="tmp" id="<?= $this->get_field_id('num_events') ?>"
        name="<?= $this->get_field_name('num_events') ?>"
        type="text" value="<?= $instance['num_events'] ?>"/>
    <label for="<?= $this->get_field_id('restrict_days') ?>"><?= esc_attr('Max days in future') ?>:</label>
    <input class="tmp" id="<?= $this->get_field_id('restrict_days') ?>"
        name="<?= $this->get_field_name('restrict_days') ?>"
        type="text" value="<?= $instance['restrict_days'] ?>"/>
</p>
