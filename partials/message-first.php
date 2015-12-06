<?php
$label_message_01 = get_field("label-message-01");
$value_message_01 = get_field("value-message-01");

if ($label_message_01 || $value_message_01) :
    ?>
    <div class="full-size-bar" id="message-01">
        <div class="col-full">
            <h2><?php echo $label_message_01; ?></h2>
            <p><?php echo $value_message_01; ?></p>
        </div>
    </div>
<?php endif; ?>
