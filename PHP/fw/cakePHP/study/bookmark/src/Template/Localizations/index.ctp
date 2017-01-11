<?php
echo $this->Form->create('Localizations', ['url' => 'locale']);
echo $this->Form->radio('locale', [
    ['value' => 'en_US', 'text' => 'English'],
    ['value' => 'de_DE', 'text' => 'German'],
    ['value' => 'fr_FR', 'text' => 'French'],
]);
echo $this->Form->button('Change language');
echo $this->Form->end();

?>

<?= __('msg') ?>
