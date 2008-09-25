<?
    function newStudent() {
        return array(
           "name" => "no name set",
           "email" => "no email set",
           "address" => array(
               "street" => "",
               "city" => "",
               "state" => "",
               "postalCode" => ""
           ),
           "scores" => array()
        );
    }
?>

<?
    $isPost = !empty($_POST);
    $req = $isPost? $_POST : $_GET;

    $t = $db["students"];
            
    $student = $req["s__id"]? $t->findOne($req["s__id"]) : newStudent();
    $courses = $db["courses"]->find()->toArray();

    $action = strtolower( $req["action"] );
    $isNew = false;
    
    //Delete
    if($action=="delete") {
        $t->remove($student);
        header("Location: students.php");
        return;
    }
    //Save
    else if($action == "save") {
        $msg = "Saved";

        $student["name"] = $req["s_name"];
        $student["email"] = $req["s_email"];
        $student["address"]["street"] = $req["s_address.street"];
        $student["address"]["city"] = $req["s_address.city"];
        $student["address"]["state"] = $req["s_address.state"];
        $student["address"]["postalCode"] = $req["s_address.postalCode"];
        
        $t->save($student);
    }
    //Add Score
    else if($action == "add") {
        $course = $db["courses"]->findOne($req["course_for"]);
        $grade = $req["score"];
        
        $student["scores"][] = array("for_course"=>$course, "grade"=>$grade);
        $t->save($student);
    }
    //Edit
    else if($action == "edit") {
        //noop
    }
    //New
    else /*if($action == "new")*/ {
        $student = newStudent();
        $isNew = true;
    }
?>

<? require("pieces/header.php") ?>
    <h3>Student Editing</h3>
    
    <form method="POST" >
    
        <fieldset>
        
            <? if($isNew) { ?>
                <legend>New User</legend>
            <? } ?>
          
            <input type="hidden" name="s__id" value="<?= $student["_id"] ?>" />    
              
            <label>Name</label>
            <input type="text" name="s_name" value="<?= $student["name"] ?>" />
        
            <label>Email</label>
            <input type="text" name="s_email" value="<?= $student["email"] ?>" />
        
            <label>Street</label>
            <input type="text" name="s_address.street" value="<?= $student["address"]["street"] ?>" />
        
            <label>City</label>
            <input type="text" name="s_address.city" value="<?= $student["address"]["city"] ?>" />
        
            <label>State</label>
            <input type="text" name="s_address.state" value="<?= $student["address"]["state"] ?>" />
        
            <label>Postal Code</label>
            <input type="text" name="s_address.postalCode" value="<?= $student["address"]["postalCode"] ?>" />
            
            <label></label>
            <input type="submit" name="action" value="Save" />
    
        </fieldset>

    </form>
    

    <? if($student["_id"]) { ?>
        <h3>Scores</h3>
    
        <table class="grid" cellpadding="0" cellspacing="0">
            <? foreach($student["scores"] as $score) { ?>
                <tr>
                    <td>Course <?= $score["for_course"]["name"] ?></td>
                    <td><?= $score["grade"] ?></td>
                </tr>
            <? } ?>
        </table>
        <form method="POST">
            <input type="hidden" name="s__id" value="<?= $student["_id"] ?>" /> 
            <select name="course_for">
                <? foreach($courses as $c) { ?>
                    <option value="<?= $c["_id"] ?>"><?= $c["name"] ?></option> 
                <? } ?>
            </select>
            <select name="score">
                <? foreach(array("A", "B", "C") as $g) { ?>
                    <option><?= $g ?></option> 
                <? } ?>
            </select>

            <input type="submit" name="action" value="Add" />
        </form> 
    <? } ?>
