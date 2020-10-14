<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article1 extends Model
{
    use HasFactory;

    public static function articleType(){
        $articleTypes = [
            0 => [
                'Id' => 0,
                'Title' => 'Category #1',
                'Thumb' => 'https://images.unsplash.com/photo-1553831755-2a0a5370efe4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=612&q=80'
            ],
            1 => [
                'Id' => 1,
                'Title' => 'Category #2',
                'Thumb' => 'https://images.unsplash.com/photo-1551717309-88444dbe54f5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80'
            ],
            2 => [
                'Id' => 2,
                'Title' => 'Category #3',
                'Thumb' => 'https://images.unsplash.com/photo-1549210338-a03623c2bde3?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
            ],
            3 => [
                'Id' => 1,
                'Title' => 'Category #4',
                'Thumb' => 'https://images.unsplash.com/photo-1561266322-ccd177d44cff?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjExMDk0fQ&auto=format&fit=crop&w=1491&q=80'
            ],
        ];

        return $articleTypes;
    }

    public static function article(){
        $articles = collect();

        $articles->push([
            'Id' => 0,
            'CategoryId' => 0,
            'Thumb' => 'https://images.unsplash.com/photo-1600658494306-814b9a13e63f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80',
            'Title' => 'Fusce sem nulla, maximus sit amet sapien eu',
            'Desc' => 'Donec massa ante, facilisis quis fringilla id, bibendum ut enim. Nullam ac elit eget tellus ultricies varius at ut odio. Vivamus enim tellus, eleifend vel sollicitudin ac, accumsan quis orci.',
            'Detail' => '',
            'Slug' => 'fusce-sem-nulla-maximus-sit-amet-sapien-eu',
            'CreatedAt' => '20/02/2020'
        ]);

        $articles->push([
            'Id' => 1,
            'CategoryId' => 2,
            'Thumb' => 'https://images.unsplash.com/photo-1596078841242-12f73dc697c6?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=80',
            'Title' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce sem nulla',
            'Desc' => '',
            'Detail' => '',
            'Slug' => 'pellentesque-habitant-morbi-tristique-senectus-et-netus-et-malesuada-fames-ac-turpis-egestas-fusce-sem-nulla',
            'CreatedAt' => '20/02/2020'
        ]);

        $articles->push([
            'Id' => 2,
            'CategoryId' => 1,
            'Thumb' => '',
            'Title' => 'Quisque condimentum quam porttitor, aliquet risus nec, tincidunt urna. Integer vehicula vitae lacus lacinia convallis. Proin in tempus metus',
            'Desc' => 'Donec massa ante, facilisis quis fringilla id, bibendum ut enim. Nullam ac elit eget tellus ultricies varius at ut odio. Vivamus enim tellus, eleifend vel sollicitudin ac, accumsan quis orci.',
            'Detail' => '',
            'Slug' => 'quisque-condimentum-quam-porttitor-aliquet-risus-nec-tincidunt-urna-integer-vehicula-vitae-lacus-lacinia-convallis-proin-in-tempus-metus',
            'CreatedAt' => '20/02/2020'
        ]);

        $articles->push([
            'Id' => 3,
            'CategoryId' => 0,
            'Thumb' => 'https://images.unsplash.com/photo-1551462577-9aaf3ff5d927?ixlib=rb-1.2.1&auto=format&fit=crop&w=1056&q=80',
            'Title' => 'Integer vehicula vitae lacus lacinia convallis. Proin in tempus metus',
            'Desc' => '',
            'Detail' => '',
            'Slug' => 'integer-vehicula-vitae-lacus-lacinia-convallis-proin-in-tempus-metus',
            'CreatedAt' => '20/02/2020'
        ]);

        return $articles;
    }
}
