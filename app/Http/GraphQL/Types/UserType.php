<?php

namespace App\Http\GraphQL\Types;

use GraphQL;
use App\Http\GraphQL\Connections\UserJobsConnection;
use GraphQL\Type\Definition\Type;
use Nuwave\Lighthouse\Support\Definition\GraphQLType;
use Nuwave\Lighthouse\Support\Interfaces\RelayType;

class UserType extends GraphQLType implements RelayType
{
    /**
     * Attributes of type.
     *
     * @var array
     */
    protected $attributes = [
        'name' => 'User',
        'description' => 'Employee of Acme Job Management Inc.'
    ];

    /**
     * Get model by id.
     *
     * Note: When the root 'node' query is called, this method
     * will be used to resolve the type by providing the id.
     *
     * @param  mixed $id
     * @return mixed
     */
    public function resolveById($id)
    {
        return \App\User::find($id);
    }

    /**
     * Type fields.
     *
     * @return array
     */
    public function fields()
    {
        return [
            'name' => [
                'type' => Type::string(),
                'description' => 'Name of the employee.',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'Email address of the employee.',
            ],
            'jobs' => GraphQL::connection(new UserJobsConnection)->field(),
        ];
    }
}
