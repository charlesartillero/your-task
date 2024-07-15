<?php

use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Exception\DynamoDbException;

$dynamodb = new DynamoDbClient([
    'region' => 'us-west-2',
    'version' => 'latest',
    'endpoint' => 'http://localhost:8000',
    'credentials' => [
        'key' => 'fakeMyKeyId',
        'secret' => 'fakeSecretAccessKey'
    ],
]);

try {
    $result = $dynamodb->listTables();
    print_r($result);
} catch (DynamoDbException $e) {
    echo "Unable to list tables: \n";
    echo $e->getMessage() . "\n";
}
