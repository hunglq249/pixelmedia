<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    public static function jobs(){
        $jobs = collect();

        $jobs->push([
            'Id' => '0',
            'Title' => 'Video Editor',
            'Desc' => 'Donec massa ante, facilisis quis fringilla id, bibendum ut enim. Nullam ac elit eget tellus ultricies varius at ut odio. Vivamus enim tellus, eleifend vel sollicitudin ac, accumsan quis orci.',
            'Thumb' => 'https://images.unsplash.com/photo-1583215794430-78a2c664751e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80',
            'Detail' => [
                0 => [
                    'Heading' => 'Desc #1',
                    'Content' => 'Donec massa ante, facilisis quis fringilla id, bibendum ut enim. Nullam ac elit eget tellus ultricies varius at ut odio. Vivamus enim tellus, eleifend vel sollicitudin ac, accumsan quis orci.'
                ],
                1 => [
                    'Heading' => 'Desc #2',
                    'Content' => 'Donec massa ante, facilisis quis fringilla id, bibendum ut enim. Nullam ac elit eget tellus ultricies varius at ut odio. Vivamus enim tellus, eleifend vel sollicitudin ac, accumsan quis orci.'
                ],
                2 => [
                    'Heading' => 'Desc #3',
                    'Content' => 'Donec massa ante, facilisis quis fringilla id, bibendum ut enim. Nullam ac elit eget tellus ultricies varius at ut odio. Vivamus enim tellus, eleifend vel sollicitudin ac, accumsan quis orci.'
                ],
                3 => [
                    'Heading' => 'Desc #4',
                    'Content' => 'Donec massa ante, facilisis quis fringilla id, bibendum ut enim. Nullam ac elit eget tellus ultricies varius at ut odio. Vivamus enim tellus, eleifend vel sollicitudin ac, accumsan quis orci.'
                ],
            ]
        ]);

        $jobs->push([
            'Id' => '1',
            'Title' => 'Video Effect',
            'Desc' => 'Donec massa ante, facilisis quis fringilla id, bibendum ut enim. Nullam ac elit eget tellus ultricies varius at ut odio. Vivamus enim tellus, eleifend vel sollicitudin ac, accumsan quis orci.',
            'Thumb' => 'https://images.unsplash.com/photo-1574717024239-25253f4ef40a?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80',
            'Detail' => [
                0 => [
                    'Heading' => 'Desc #1',
                    'Content' => 'Donec massa ante, facilisis quis fringilla id, bibendum ut enim. Nullam ac elit eget tellus ultricies varius at ut odio. Vivamus enim tellus, eleifend vel sollicitudin ac, accumsan quis orci.'
                ],
                1 => [
                    'Heading' => 'Desc #2',
                    'Content' => 'Donec massa ante, facilisis quis fringilla id, bibendum ut enim. Nullam ac elit eget tellus ultricies varius at ut odio. Vivamus enim tellus, eleifend vel sollicitudin ac, accumsan quis orci.'
                ],
                2 => [
                    'Heading' => 'Desc #3',
                    'Content' => 'Donec massa ante, facilisis quis fringilla id, bibendum ut enim. Nullam ac elit eget tellus ultricies varius at ut odio. Vivamus enim tellus, eleifend vel sollicitudin ac, accumsan quis orci.'
                ],
                3 => [
                    'Heading' => 'Desc #4',
                    'Content' => 'Donec massa ante, facilisis quis fringilla id, bibendum ut enim. Nullam ac elit eget tellus ultricies varius at ut odio. Vivamus enim tellus, eleifend vel sollicitudin ac, accumsan quis orci.'
                ],
            ]
        ]);

        $jobs->push([
            'Id' => '2',
            'Title' => 'Visual Artist',
            'Desc' => 'Donec massa ante, facilisis quis fringilla id, bibendum ut enim. Nullam ac elit eget tellus ultricies varius at ut odio. Vivamus enim tellus, eleifend vel sollicitudin ac, accumsan quis orci.',
            'Thumb' => 'https://images.unsplash.com/photo-1565221287653-9a2713dbe4ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1051&q=80',
            'Detail' => [
                0 => [
                    'Heading' => 'Desc #1',
                    'Content' => 'Donec massa ante, facilisis quis fringilla id, bibendum ut enim. Nullam ac elit eget tellus ultricies varius at ut odio. Vivamus enim tellus, eleifend vel sollicitudin ac, accumsan quis orci.'
                ],
                1 => [
                    'Heading' => 'Desc #2',
                    'Content' => 'Donec massa ante, facilisis quis fringilla id, bibendum ut enim. Nullam ac elit eget tellus ultricies varius at ut odio. Vivamus enim tellus, eleifend vel sollicitudin ac, accumsan quis orci.'
                ],
                2 => [
                    'Heading' => 'Desc #3',
                    'Content' => 'Donec massa ante, facilisis quis fringilla id, bibendum ut enim. Nullam ac elit eget tellus ultricies varius at ut odio. Vivamus enim tellus, eleifend vel sollicitudin ac, accumsan quis orci.'
                ],
                3 => [
                    'Heading' => 'Desc #4',
                    'Content' => 'Donec massa ante, facilisis quis fringilla id, bibendum ut enim. Nullam ac elit eget tellus ultricies varius at ut odio. Vivamus enim tellus, eleifend vel sollicitudin ac, accumsan quis orci.'
                ],
            ]
        ]);

        return $jobs;
    }
}
