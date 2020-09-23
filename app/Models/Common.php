<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Common extends Model
{
    use HasFactory;

    // HEADER NAV MENU
    public static function navMenu(){
        $navMenu = [
            0 => [
                'Title' => 'Showcase',
                'Link' => route('showcase'),
                'Slug' => 'showcase'
            ],
            1 => [
                'Title' => 'Articles',
                'Link' => route('article'),
                'Slug' => 'bai-viet'
            ],
            2 => [
                'Title' => 'Career',
                'Link' => route('career'),
                'Slug' => 'tuyen-dung'
            ],
            3 => [
                'Title' => 'About us',
                'Link' => route('about'),
                'Slug' => 'gioi-thieu'
            ],
            4 => [
                'Title' => 'Contact us',
                'Link' => route('contact'),
                'Slug' => 'lien-he'
            ],
        ];

        return $navMenu;
    }

    public static function products(){
		$products = collect();
		
		$products->push(
			[
				'Subtitle' => 'Project #1',
				'Title' => 'Title of project 1',
                'Category' => 'VFX',
                'CoverType' => 0,
                'CoverUrl' => 'https://images.unsplash.com/photo-1478720568477-152d9b164e26?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80',
			],
		);

		$products->push(
			[
				'Subtitle' => 'Project #2',
				'Title' => 'Title of project 2',
                'Category' => 'Visual',
                'CoverType' => 1,
                'CoverUrl' => 'k89qQ6MUg-4',
			],
		);

		$products->push(
			[
				'Subtitle' => 'Project #3',
				'Title' => 'Title of project 3',
                'Category' => 'Making of',
                'CoverType' => 1,
                'CoverUrl' => 'pLGE1NLyvmE',
			],
		);

		$products->push(
			[
				'Subtitle' => 'Project #4',
				'Title' => 'Title of project 4',
                'Category' => 'VFX',
                'CoverType' => 0,
                'CoverUrl' => 'https://images.unsplash.com/photo-1569317002804-ab77bcf1bce4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80',
			],
		);

		return $products;
    }
    
    public static function contactInfo(){
        $contactInfo = [
            'Address' => 'No 2, Ng Khanh Toan, Cau Giay Dist., Hanoi',
            'Email' => 'px.visualart@gmail.com',
            'PhoneNumber' => '(+84) 1234 5678',
            'Social' => [
                'Facebook' => 'https://www.facebook.com/pg/Pixel-Media-341017606305657/about/?ref=page_internal',
                'Instagram' => '#',
                'Youtube' => '#',
                'Behance' => 'https://www.behance.net/pxmediaart'
            ],
        ];

        return $contactInfo;
    }
}
