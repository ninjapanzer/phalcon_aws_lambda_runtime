<?php

use Phalcon\Mvc\Micro;

$app = new Micro();

// Retrieves all robots
$app->get(
    '/',
    function () {
        /*
        {
            "isBase64Encoded": true|false,
            "statusCode": httpStatusCode,
            "headers": { "headerName": "headerValue", ... },
            "body": "..."
        }
        */
        
        $data['isBase64'] = false;
        $data['statusCode'] = 200;
        $data['headers'] = '';
        $data['body'] = 'hello from phalcon';
        
        echo json_encode($data);
    }
);

// Retrieves all robots
$app->post(
    '/',
    function () {
        /*
        {
            "isBase64Encoded": true|false,
            "statusCode": httpStatusCode,
            "headers": { "headerName": "headerValue", ... },
            "body": "..."
        }
        */
        
        $data['isBase64'] = false;
        $data['statusCode'] = 200;
        $data['headers'] = '';
        $data['body'] = 'hello from phalcon';
        
        echo json_encode($data);
    }
);

// Searches for robots with $name in their name
$app->get(
    '/api/robots/search/{name}',
    function ($name) {
        // Operation to fetch robot with name $name
    }
);

// Retrieves robots based on primary key
$app->get(
    '/api/robots/{id:[0-9]+}',
    function ($id) {
        // Operation to fetch robot with id $id
    }
);

// Adds a new robot
$app->post(
    '/api/robots',
    function () {
        // Operation to create a fresh robot
    }
);

// Updates robots based on primary key
$app->put(
    '/api/robots/{id:[0-9]+}',
    function ($id) {
        // Operation to update a robot with id $id
    }
);

// Deletes robots based on primary key
$app->delete(
    '/api/robots/{id:[0-9]+}',
    function ($id) {
        // Operation to delete the robot with id $id
    }
);

$app->handle();
