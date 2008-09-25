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
	
	$c = $req["id"]? $t->findOne($req["id"]) : newCourse();
	$action = $req["action"];
	$isNew = false;
	
	//Delete
	if($action=="delete") {
		$t->remove($c);
		header($site_root + "/courses");
		return;
	}
	//Save
	else if($action == "Save") {
		$msg = "Saved";
	
		$c["name"] = $req["name"];
		 
		$t->save($c);
		$c = newCourse();
	}
	//Edit
	else if($action == "edit") {
		//noop
	}
	//New
	else /*if($action == "new")*/ {
		$c = newCourse();
		$isNew = true;
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
