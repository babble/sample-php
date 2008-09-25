<?
function newCourse() {
	return array(
        "name" => "no name set"
    );
}
?>
<?
	$isPost = !empty($_POST);
	$req = $isPost? $_POST : $_GET;
	
	$t = $db["courses"];
	
	if($req["id"])
	   $c = $t->findOne($req["id"]);

	$action = $req["action"];
	$isNew = false;
	
	//Delete
	if($action=="delete") {
		$t->remove($c);
		unset($c);
	}
	//Save
	else if($action == "Save") {
		$msg = "Saved";
	
		$c["name"] = $req["name"];
		 
		$t->save($c);
		unset($c);
	}
	//Edit
	else if($action == "edit") {
		//noop
	}
	//New
	else /*if($action == "new")*/ {
		$c = newCourse();
	}
	
	if(!$c) {
	   header("Location: courses.php");
	   return;
	}
?>

<? require("pieces/header.php") ?>

	<h3>Course Editing</h3>
	
	<form method="POST">
	
		<fieldset>
            <? if( ! $c["_id"] ) { ?>
                <legend>New Course</legend>
            <? } ?>

            <input type="hidden" name="id" value="<?= $c["_id"] ?>" />

            <label>Name</label>
            <input type="text" name="name" value="<?= $c["name"] ?>" /><br />

            <label></label>
            <input type="submit" name="action" value="Save" />
        </fieldset>
	</form>

<? require("pieces/footer.php") ?>
