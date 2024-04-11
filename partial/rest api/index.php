<?php

require_once 'TaskController.php';

$taskController = new TaskController();

$requestMethod = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';

switch ($requestMethod) {
    case 'GET':
        if ($path === '/tasks') {
            $taskController->getAllTasks();
        } elseif (preg_match('/\/tasks\/(\d+)/', $path, $matches)) {
            $taskId = $matches[1];
            $taskController->getTask($taskId);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Endpoint not found']);
        }
        break;
    case 'POST':
        if ($path === '/tasks') {
            $taskController->createTask();
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Endpoint not found']);
        }
        break;
    case 'PUT':
        if (preg_match('/\/tasks\/(\d+)/', $path, $matches)) {
            $taskId = $matches[1];
            $taskController->updateTask($taskId);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Endpoint not found']);
        }
        break;
    case 'DELETE':
        if (preg_match('/\/tasks\/(\d+)/', $path, $matches)) {
            $taskId = $matches[1];
            $taskController->deleteTask($taskId);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Endpoint not found']);
        }
        break;
    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
}
