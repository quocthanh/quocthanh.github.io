<div class="users form">
<?= $this->Flash->render('auth') ?>
<h1>Login</h1>
<?= $this->Form->create() ?>
<fieldset>
    <legend><?= __('Please enter your username and password.') ?></legend>
    <?= $this->Form->input('username') ?>
    <?= $this->Form->input('password') ?>
</fieldset>
<?= $this->Form->button(__('Login')) ?>
<?= $this->Form->end() ?>
</div>
