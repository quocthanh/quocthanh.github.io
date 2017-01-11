<a href="add">Add users</a>
<table>
    <tr>
        <td>ID</td>
        <td>Username</td>
        <td>Password</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>

    <?php
        foreach ($results as $row):
            echo '<tr><td>' . $row->id . '</td>';
            echo '<td>' . $row->username . '</td>';
            echo '<td>' . $row->password . '</td>';
            echo "<td><a href='" . $this->Url->build(['controller' => 'Users', 'action' => 'edit', $row->id]) .
                 "'>Edit</a></td>";
            echo "<td><a href='" . $this->Url->build(['controller' => 'Users', 'action' => 'delete', $row->id]) .
                 "'>Delete</a></td>";
        endforeach;
    ?>
</table>
