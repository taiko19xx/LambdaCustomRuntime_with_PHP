<?php
require_once '../vendor/autoload.php';

use Slim\Http\Request as Request;
use Slim\Http\Response as Response;
use Ramsey\Uuid\Uuid;
use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Marshaler;

// App Configuration
$config = [
    'settings' => [
        'displayErrorDetails' => true
    ]
];
$app = new \Slim\App($config);

// Container Configuration
$container = $app->getContainer();
$container['DynamoDB'] = function($c) {
    return new DynamoDbClient([
        'version' => '2012-08-10',
        'region' => 'ap-northeast-1'
    ]);
};
$container['Marshaler'] = function($c) {
    return new Marshaler();
};

/**
 * Get data
 */
$app->get('/get/{id}', function (Request $req, Response $res, Array $args) use ($container) {
    /** @var DynamoDbClient $dynamo */
    $dynamo = $container['DynamoDB'];
    /** @var Marshaler $marshaler */
    $marshaler = $container['Marshaler'];

    // Read Item
    $result = $dynamo->getItem([
        'TableName' => getenv('DynamoTableName'),
        'Key' => [
            'id' => ['S' => $args['id']]
        ]
    ]);

    // Unmarshal item
    $data = [];
    if(isset($result['Item'])) {
        $data = $marshaler->unmarshalItem($result['Item']);
        unset($data['id']);
    }

    // Return values
    return $res->withJson($data['values']);
});

/**
 * Post data
 */
$app->post('/post', function (Request $req, Response $res, Array $args) use ($container) {
    /** @var DynamoDbClient $dynamo */
    $dynamo = $container['DynamoDB'];
    /** @var Marshaler $marshaler */
    $marshaler = $container['Marshaler'];

    // Generate UUID
    $uuid = Uuid::uuid4();
    $id = $uuid->toString();

    // Write Item
    $dynamo->putItem([
        'TableName' => getenv('DynamoTableName'),
        'Item' => [
            'id' => ['S' => $id],
            'values' => ['M' => $marshaler->marshalItem($req->getParsedBody())]
        ]
    ]);

    // Return UUID
    return $res->withJson(['id' => $id]);
});

$app->run();