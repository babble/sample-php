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
            
    $student = $req["id"]? $t->findOne($req["id"]) : newStudent();
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

    	$student["name"] = $req["name"];
    	$student["email"] = $req["email"];
    	$student["address"]["street"] = $req["address.street"];
    	$student["address"]["city"] = $req["address.city"];
    	$student["address"]["state"] = $req["address.state"];
    	$student["address"]["postalCode"] = $req["address.postalCode"];
    	
    	$t->save($student);
    }
    //Add Score
    else if($action == "add") {
        $course = $db["courses"]->findOne($req["for_course"]);
        $grade = $req["grade"];
        
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
	      
	        <input type="hidden" name="id" value="<?= $student["_id"] ?>" />	
		  	
	        <label>Name</label>
	        <input type="text" name="name" value="<?= $student["name"] ?>" />
		
		    <label>Email</label>
	        <input type="text" name="email" value="<?= $student["email"] ?>" />
		
		    <label>Street</label>
	        <input type="text" name="address.street" value="<?= $student["address"]["street"] ?>" />
		
		    <label>City</label>
	        <input type="text" name="address.city" value="<?= $student["address"]["city"] ?>" />
		
		    <label>State</label>
		    <input type="text" name="address.state" value="<?= $student["address"]["state"] ?>" />
		
		    <label>Postal Code</label>
	        <input type="text" name="address.postalCode" value="<?= $student["address"]["postalCode"] ?>" />
		    
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
            <input type="hidden" name="id" value="<?= $student["_id"] ?>" /> 
            <select name="for_course">
                <? foreach($courses as $c) { ?>
                    <option value="<?= $c["_id"] ?>"><?= $c["name"] ?></option> 
                <? } ?>
            </select>
            <select name="grade">
                <? foreach(array("A", "B", "C") as $g) { ?>
                    <option><?= $g ?></option> 
                <? } ?>
            </select>

            <input type="submit" name="action" value="Add" />
        </form> 
    <? } ?>
