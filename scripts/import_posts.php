<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Database.php';
require_once __DIR__ . '/../src/Config.php';

use silverorange\DevTest\Database;
use silverorange\DevTest\Config;

$config = new Config();
$database = new Database($config->dsn);
$pdo = $database->getConnection();

$dataDir = __DIR__ . '/../data';

$files = array_diff(scandir($dataDir), array('..', '.'));

foreach ($files as $file) {
    $filePath = $dataDir . '/' . $file;
    $content = file_get_contents($filePath);
    $postData = json_decode($content, true);

    if ($postData) {
        $authorStmt = $pdo->prepare("SELECT id FROM Authors WHERE id = ?");
        $authorStmt->execute([$postData['author']]);
        $authorExists = $authorStmt->fetchColumn();

        if ($authorExists) {
            $stmt = $pdo->prepare("INSERT INTO Posts (id, title, body, created_at, modified_at, author) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $postData['id'],
                $postData['title'],
                $postData['body'],
                date('Y-m-d H:i:s', strtotime($postData['created_at'])),
                date('Y-m-d H:i:s', strtotime($postData['modified_at'])),
                $postData['author']
            ]);
            echo "Imported '{$postData['title']}' successfully from {$file}.\n";
        } else {
            echo "Author UUID '{$postData['author']}' not found for {$file}, skipping.\n";
        }
    } else {
        echo "Failed to import {$file}.\n";
    }
}
