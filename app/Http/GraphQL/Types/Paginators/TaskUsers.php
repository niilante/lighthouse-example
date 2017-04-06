<?php

namespace App\Http\GraphQL\Types\Paginators;

use GraphQL;
use Illuminate\Pagination\LengthAwarePaginator;
use GraphQL\Type\Definition\Type;
use Nuwave\Lighthouse\Support\Definition\GraphQLType;

class TaskUsers extends GraphQLType
{
    /**
     * Attributes of type.
     *
     * @var array
     */
    protected $attributes = [
        'name' => 'TaskUsers',
        'description' => 'Users assigned to task.'
    ];

    /**
     * Type fields.
     *
     * @return array
     */
    public function fields()
    {
        return [
            'count' => [
                'type' => Type::int(),
                'resolve' => function (LengthAwarePaginator $users) {
                    return $users->count();
                }
            ],
            'total' => [
                'type' => Type::int(),
                'resolve' => function (LengthAwarePaginator $users) {
                    return $users->total();
                }
            ],
            'hasNextPage' => [
                'type' => Type::boolean(),
                'resolve' => function (LengthAwarePaginator $users) {
                    return $users->hasMorePages();
                }
            ],
            'currentPage' => [
                'type' => Type::int(),
                'resolve' => function (LengthAwarePaginator $users) {
                    return $users->currentPage();
                }
            ],
            'users' => [
                'type' => Type::listOf(GraphQL::type('user')),
                'resolve' => function (LengthAwarePaginator $users) {
                    return $users->items();
                }
            ]
        ];
    }
}
