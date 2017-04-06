<?php

namespace App\Http\GraphQL\Types;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Nuwave\Lighthouse\Support\Definition\GraphQLType;
use Nuwave\Lighthouse\Support\Interfaces\RelayType;

class JobType extends GraphQLType implements RelayType
{
    /**
     * Attributes of type.
     *
     * @var array
     */
    protected $attributes = [
        'name' => 'Job',
        'description' => 'A job created by an employee.',
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
        return \App\Job::first($id);
    }

    /**
     * Type fields.
     *
     * @return array
     */
    public function fields()
    {
        return [
            'title' => [
                'type' => Type::string(),
                'description' => 'Title of the job.',
            ]
        ];
    }
}
