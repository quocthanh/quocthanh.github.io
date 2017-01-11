<div class="users form">
<?= $this->Form->create($user) ?>
<?= $this->Form->input('username') ?>
<?= $this->Form->input('password') ?>
<?=
    $this->Form->input('role', [
        'options' => ['admin' => 'Admin', 'author' => 'Author']
    ])
?>
<?= $this->Form->button('Submit') ?>
<?= $this->Form->end() ?>
</div>
