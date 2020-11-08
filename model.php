<?php
    include 'includes/database.php';
    global $db;

    extract($_GET);

    if ($model && $action && $id) {
        if ($action == "delete") {
            $query = $db->prepare("DELETE FROM `$model` WHERE (id = :id);");
            $query->execute([
                'id' => $id,
            ]);
        }
    }

    unset($_GET);
