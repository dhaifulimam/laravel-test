<?php

namespace App\Models;


class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Muhammad Dhaiful Imam",
            "body" => " Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga saepe optio amet quibusdam? Laborum debitis ullam ducimus omnis saepe nesciunt. Nesciunt veritatis eum quae non neque, fugiat ullam voluptatum sunt ab esse aliquid cupiditate amet facere, consequuntur rerum autem tempore voluptate tempora! Accusamus nihil blanditiis voluptate enim molestiae quidem hic earum veniam. Totam explicabo mollitia eius quod in neque nulla itaque. Commodi aliquam animi consectetur, officia vel cum dolore alias temporibus nisi. Distinctio, illum! Distinctio soluta illum quia nulla similique."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "imam",
            "body" => " Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga saepe optio amet quibusdam? Laborum debitis ullam ducimus omnis saepe nesciunt. Nesciunt veritatis eum quae non neque, fugiat ullam voluptatum sunt ab esse aliquid cupiditate amet facere, consequuntur rerum autem tempore voluptate tempora! Accusamus nihil blanditiis voluptate enim molestiae quidem hic earum veniam. Totam explicabo mollitia eius quod in neque nulla itaque. Commodi aliquam animi consectetur, officia vel cum dolore alias temporibus nisi. Distinctio, illum! Distinctio soluta illum quia nulla similique."
        ]
    ];


    public static function All()
    {
        return collect(self::$blog_posts);
    }
    public static function find($slug)
    {
        $posts = static::all();

        //Cara Manual
        // foreach ($posts as $p) {
        //     if ($p["slug"] === $slug) {
        //         $new_post = $p;
        //     }
        // }
        // return $new_post;

        return $posts->firstWhere('slug', $slug);
    }
}
