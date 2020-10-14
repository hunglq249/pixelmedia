<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    public static function aboutInfo(){
        $aboutInfo = [
            'Images' => [
                'Cover' => 'https://images.unsplash.com/photo-1568720888838-51fd77a98242?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1058&q=80',
                'Break' => [
                    0 => [
                        'https://images.unsplash.com/photo-1512025643695-0a16afd9d533?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=488&q=80',
                        'https://images.unsplash.com/photo-1560439514-0fc9d2cd5e1b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80',
                        'https://images.unsplash.com/photo-1575970357220-68d2267c1b55?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80'
                    ],
                    1 => [
                        'https://images.unsplash.com/photo-1512025643695-0a16afd9d533?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=488&q=80',
                        'https://images.unsplash.com/photo-1560439514-0fc9d2cd5e1b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80',
                        'https://images.unsplash.com/photo-1575970357220-68d2267c1b55?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80'
                    ]
                ]
            ]
        ];

        return $aboutInfo;
    }

    public static function staff(){
        $staff = collect();

        $staff->push([
            'Id' => 0,
            'Name' => 'James Bond',
            'Position' => 'Director',
            'Thumb' => 'https://images.unsplash.com/photo-1597268489488-28be7e3e2baf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60'
        ]);

        $staff->push([
            'Id' => 1,
            'Name' => 'Bruce Wayne',
            'Position' => 'Video Editor',
            'Thumb' => 'https://images.unsplash.com/photo-1504909595448-91378747b0cb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'
        ]);

        $staff->push([
            'Id' => 2,
            'Name' => 'Tony Stark',
            'Position' => 'Effect Executive',
            'Thumb' => 'https://images.unsplash.com/photo-1584444527303-9d66a8948673?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=675&q=80'
        ]);

        return $staff;
    }
}
