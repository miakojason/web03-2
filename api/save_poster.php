<?php include_once "./db.php";
if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $idx => $id) {
        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $Poster->del($id);
        } else {
            $row = $Poster->find($id);
            $row['name'] = $_POST['name'][$idx];
            $row['ani'] = $_POST['ani'][$idx];
            $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
            $Poster->save($row);
        }
    }
} else {
    if (isset($_FILES['img']['tmp_name'])) {
        move_uploaded_file($_FILES['img']['tmp_name'], "../img/" . $$_FILES['img']['name']);
        $_POST['img'] = $_FILES['img']['name'];
    }
    $_POST['ani'] = rand(1, 3);
    $_POST['rank'] = $Poster->max('id')+1;
    $Poster->save($_POST);
}
to("../back.php?do=poster");
