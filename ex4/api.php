<?php
include 'Database.php';
include 'Person.php';

$db = new Database();
$person = new Person($db);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && $_GET['action'] === 'all') {
        $persons = $person->getAllPersons();
        echo json_encode($persons);
    }
    elseif (isset($_GET['action']) && $_GET['action'] === 'person' && isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $personData = $person->getPersonById($id);
        if ($personData) {
            echo json_encode($personData);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Person not found']);
        }
    }
    else {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid request']);
    }
}
?>
