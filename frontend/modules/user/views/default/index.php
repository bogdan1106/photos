<?php

// Сообщение
$message = "yoman";

// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()

// Отправляем
if(mail('b.colomiets@gmail.com', 'My Subject', $message))

echo '1';

else echo '2';
?>









<div class="user-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for actiofn "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
</div>



