<?php
$label_message_02 = get_field("label-message-02");
$value_message_02 = get_field("value-message-02");

if ($label_message_02 || $value_message_02) :
    ?>
    <div class="full-size-bar" id="message-02">
        <div class="col-full">
            <h2><?php echo $label_message_02; ?></h2>
            <p><?php echo $value_message_02; ?></p>
        </div>
    </div>
<?php endif; ?>
