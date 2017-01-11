<h1>Edit Article</h1>
<?php
echo $this->Form->create($article);
echo $this->Form->input('title');
echo $this->Form->input('body', ['row' => 3]);
echo $this->Form->button(__('Save article'));
echo $this->Form->end();
