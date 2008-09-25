<? require("pieces/header.php") ?>

    <h3>Courses</h3>

    <table class="grid" cellpadding="0" cellspacing="0">
        <tr>
            <th colspan="3">Name</th>
        </tr>
        
        <? $courses = $db["courses"]->find()->toArray() ?>
        
        <? foreach($courses as $c) { ?>
            <tr>
                <td><?= $c["name"] ?></td>
                <td><a href="course.php?action=edit&c__id=<?= $c["_id"] ?>">edit</a></td>
                <td><a href="course.php?action=delete&c__id=<?= $c["_id"] ?>">delete</a></td>
            </tr>
        <? } ?>
    </table>

    <br />

    <a href="course.php?action=New">New Course</a>

<? require("pieces/footer.php") ?>
