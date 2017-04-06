<?php

GraphQL::schema()->group(['namespace' => 'App\\Http\\GraphQL'], function () {
    GraphQL::schema()->type('user', 'Types\\UserType');
    GraphQL::schema()->type('job', 'Types\\JobType');
    GraphQL::schema()->type('task', 'Types\\TaskType');
    GraphQL::schema()->type('taskUsers', 'Types\\Paginators\\TaskUsers');

    GraphQL::schema()->query('viewer', 'Queries\\ViewerQuery');
});
