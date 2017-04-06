<?php

GraphQL::schema()->group(['namespace' => 'App\\Http\\GraphQL'], function () {
    GraphQL::schema()->type('user', 'Types\\UserType');
    GraphQL::schema()->query('viewer', 'Queries\\ViewerQuery');
});
