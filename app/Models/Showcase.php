<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showcase extends Model
{
    use HasFactory;

    public static function productType(){
        $productTypes = [
            0 => 'Visual',
            1 => 'Film',
            2 => 'VFX',
            3 => 'Making of'
        ];

        return $productTypes;
    }

    public static function product(){
        $products = collect();

        $products->push([
            'Id' => 0,
            'Title' => 'Product #1',
            'Slug' => 'product-1',
            'Type' => 0,
            'Desc' => 'Fusce a lacus id ligula tincidunt pharetra. Donec a varius enim, eget posuere ante. Sed tristique fermentum velit, at pellentesque orci porta at. Phasellus eu metus ut sem varius commodo ut vel leo. Nunc et nulla at ipsum hendrerit euismod id at tortor. Ut ultricies ipsum sit amet odio sollicitudin, quis varius purus eleifend. Maecenas scelerisque elit massa, at tristique orci ultrices vitae. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum gravida gravida semper. Pellentesque sollicitudin facilisis volutpat. Morbi rhoncus tortor augue, at auctor mi porttitor in. Suspendisse placerat sagittis lobortis. Morbi vel nibh turpis. Maecenas vehicula turpis in suscipit aliquam. Phasellus commodo gravida elit sed condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.',
            'Thumb' => 'https://images.unsplash.com/photo-1497015289639-54688650d173?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1489&q=80',
            'Client' => 'Client #1',
            'Date' => '22/02/2020',
            'TakenBy' => [
                0 => [
                    'Position' => 'Supervisor',
                    'Name' => 'Tony Stark'
                ],
                1 => [
                    'Position' => 'Video Editor',
                    'Name' => 'Bruce Wayne'
                ]
            ],
        ]);

        $products->push([
            'Id' => 1,
            'Title' => 'Product #2',
            'Slug' => 'product-2',
            'Type' => 1,
            'Desc' => 'Fusce a lacus id ligula tincidunt pharetra. Donec a varius enim, eget posuere ante. Sed tristique fermentum velit, at pellentesque orci porta at. Phasellus eu metus ut sem varius commodo ut vel leo. Nunc et nulla at ipsum hendrerit euismod id at tortor. Ut ultricies ipsum sit amet odio sollicitudin, quis varius purus eleifend. Maecenas scelerisque elit massa, at tristique orci ultrices vitae. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum gravida gravida semper. Pellentesque sollicitudin facilisis volutpat. Morbi rhoncus tortor augue, at auctor mi porttitor in. Suspendisse placerat sagittis lobortis. Morbi vel nibh turpis. Maecenas vehicula turpis in suscipit aliquam. Phasellus commodo gravida elit sed condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.',
            'Thumb' => 'https://images.unsplash.com/photo-1493953183910-f997bff7ea1e?ixlib=rb-1.2.1&auto=format&fit=crop&w=664&q=80',
            'Client' => 'Client #1',
            'Date' => '22/02/2020',
            'TakenBy' => [
                0 => [
                    'Position' => 'Supervisor',
                    'Name' => 'Tony Stark'
                ],
                1 => [
                    'Position' => 'Video Editor',
                    'Name' => 'Bruce Wayne'
                ]
            ],
        ]);

        $products->push([
            'Id' => 2,
            'Title' => 'Product #3',
            'Slug' => 'product-3',
            'Type' => 3,
            'Desc' => 'Fusce a lacus id ligula tincidunt pharetra. Donec a varius enim, eget posuere ante. Sed tristique fermentum velit, at pellentesque orci porta at. Phasellus eu metus ut sem varius commodo ut vel leo. Nunc et nulla at ipsum hendrerit euismod id at tortor. Ut ultricies ipsum sit amet odio sollicitudin, quis varius purus eleifend. Maecenas scelerisque elit massa, at tristique orci ultrices vitae. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum gravida gravida semper. Pellentesque sollicitudin facilisis volutpat. Morbi rhoncus tortor augue, at auctor mi porttitor in. Suspendisse placerat sagittis lobortis. Morbi vel nibh turpis. Maecenas vehicula turpis in suscipit aliquam. Phasellus commodo gravida elit sed condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.',
            'Thumb' => 'https://images.unsplash.com/photo-1511903979581-3f1d3afb4372?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80',
            'Client' => 'Client #1',
            'Date' => '22/02/2020',
            'TakenBy' => [
                0 => [
                    'Position' => 'Supervisor',
                    'Name' => 'Tony Stark'
                ],
                1 => [
                    'Position' => 'Video Editor',
                    'Name' => 'Bruce Wayne'
                ]
            ],
        ]);

        $products->push([
            'Id' => 3,
            'Title' => 'Product #4',
            'Slug' => 'product-4',
            'Type' => 2,
            'Desc' => 'Fusce a lacus id ligula tincidunt pharetra. Donec a varius enim, eget posuere ante. Sed tristique fermentum velit, at pellentesque orci porta at. Phasellus eu metus ut sem varius commodo ut vel leo. Nunc et nulla at ipsum hendrerit euismod id at tortor. Ut ultricies ipsum sit amet odio sollicitudin, quis varius purus eleifend. Maecenas scelerisque elit massa, at tristique orci ultrices vitae. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum gravida gravida semper. Pellentesque sollicitudin facilisis volutpat. Morbi rhoncus tortor augue, at auctor mi porttitor in. Suspendisse placerat sagittis lobortis. Morbi vel nibh turpis. Maecenas vehicula turpis in suscipit aliquam. Phasellus commodo gravida elit sed condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.',
            'Thumb' => 'https://images.unsplash.com/photo-1574717025058-2f8737d2e2b7?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80',
            'Client' => 'Client #1',
            'Date' => '22/02/2020',
            'TakenBy' => [
                0 => [
                    'Position' => 'Supervisor',
                    'Name' => 'Tony Stark'
                ],
                1 => [
                    'Position' => 'Video Editor',
                    'Name' => 'Bruce Wayne'
                ]
            ],
        ]);

        return $products;
    }
}
