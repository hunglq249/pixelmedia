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
                'Title' => trans('lang.nav_showcase'),
                'Link' => route('showcase'),
                'Slug' => 'san-pham'
            ],
            1 => [
                'Title' => trans('lang.nav_articles'),
                'Link' => route('article'),
                'Slug' => 'bai-viet'
            ],
            2 => [
                'Title' => trans('lang.nav_recruitment'),
                'Link' => route('career'),
                'Slug' => 'tuyen-dung'
            ],
            3 => [
                'Title' => trans('lang.nav_about'),
                'Link' => route('about'),
                'Slug' => 'gioi-thieu'
            ],
            4 => [
                'Title' => trans('lang.nav_contact'),
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
				'Subtitle' => 'LANDMARK 81',
				'Title' => 'BIỂU TƯỢNG MỚI CỦA SÀI GÒN HOA LỆ',
                'Category' => 'VFX',
                'CoverType' => 0,
                'CoverUrl' => 'https://mir-s3-cdn-cf.behance.net/project_modules/2800_opt_1/0bd31f99868495.5efc4e3b45884.png',
                'CoverMask' => 'https://mir-s3-cdn-cf.behance.net/project_modules/2800_opt_1/0bd31f99868495.5efc4e3b45884.png'
			],
		);

		$products->push(
			[
				'Subtitle' => 'Hologram',
				'Title' => 'CMC Telecom',
                'Category' => 'Visual',
                'CoverType' => 1,
                'CoverUrl' => 'gdeWc3dT2S0',
                'CoverMask' => 'https://mir-s3-cdn-cf.behance.net/project_modules/2800_opt_1/244f6674892305.5c3dc8acdfaac.png'
			],
		);

		$products->push(
			[
				'Subtitle' => 'KEM BEACH RESORT',
				'Title' => 'SUN PREMIER VILLAGE',
                'Category' => 'TVC',
                'CoverType' => 1,
                'CoverUrl' => 'wimB6jv4fL4',
                'CoverMask' => 'https://mir-s3-cdn-cf.behance.net/project_modules/fs/82ae9b84442269.5d5d15d99f1bd.png'
			],
		);

		$products->push(
			[
				'Subtitle' => 'Visual show',
				'Title' => 'DAVINES SHOW',
                'Category' => 'Visual',
                'CoverType' => 0,
                'CoverUrl' => 'https://mir-s3-cdn-cf.behance.net/project_modules/1400_opt_1/7f6b3890737655.5e1f2c1f18e66.jpg',
                'CoverMask' => 'https://mir-s3-cdn-cf.behance.net/project_modules/1400_opt_1/7f6b3890737655.5e1f2c1f18e66.jpg'
			],
		);

		return $products;
    }
    
    public static function contactInfo(){
        $contactInfo = [
            'Address' => trans('lang.footer_address'),
            'Email' => 'px.visualart@gmail.com',
            'PhoneNumber' => [
                'Mr.Linh' => '0966.689.792',
                'Mr.Tú' => '0983.213.195'
            ],
            'Social' => [
                'Facebook' => 'https://www.facebook.com/pg/Pixel-Media-341017606305657/about/?ref=page_internal',
                'Youtube' => 'https://www.youtube.com/channel/UCk2hc04CDVg2BVOzBYRnBDA',
                'Behance' => 'https://www.behance.net/pxmediaart',
                'Instagram' => 'https://www.instagram.com/pxmedia.art/?fbclid=IwAR3mmMtwEeQnLHv2nIbOve2IwwhkZZX6Lddi7pzuiG5Z4r69mQNjdhZyYMs',
            ],
        ];

        return $contactInfo;
    }
}
