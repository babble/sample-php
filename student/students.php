<? require("pieces/header.php") ?>

    <h3>Students</h3>

    <table class="grid" cellpadding="0" cellspacing="0">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Number of Courses</th>
        </tr>
	  
        <? $ss = $db["students"]->find()->toArray() ?>

        <? foreach($ss as $s) { ?>
            <tr>
    	        <td><?= $s["name"] ?></td>
                <td><?= $s["email"] ?></td>
	            <td><?= count($s["scores"]) ?></td>
	            <td><a href="<?= $site_root ?>/student.php?action=edit&s__id=<?= $s["_id"] ?>">edit</a></td>
                <td><a href="<?= $site_root ?>/student.php?action=delete&s__id=<?= $s["_id"] ?>">delete</a></td>
            </tr>
        <? } ?>	  
	</table>

	<br />

	<a href="student.php?action=new">New Student</a>

<? require("pieces/footer.php") ?>
