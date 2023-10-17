<?php

namespace App\Controllers;

use App\Models\UserModel;

class PostController extends BaseController
{
    public function ejercicio01(){
        $db = \Config\Database::connect();
        $posts = $db->query('select c.category, p.id, p.title,u.username,p.created_at
        from categories as c right join posts as p on p.category = c.id
        left join users as u on u.id = p.autor where p.created_at between "2023/01/01" and "2023/12/31"')->getResultArray();

        $data = [
            'posts' => $posts
        ];

        return view('posts/ejercicio01', $data);
    }

    public function ejercicio02(){
        $db = \Config\Database::connect();
        //$u = $db->query('select * from users where id=2')->getResultArray();
        //$ui = $db->query('select * from userinfo where id=2')->getResultArray();
        //$p = $db->query('select * from posts order by category desc, created_at desc limit 10')->getResultArray();
        $posts = $db->query('select p.title, concat(ui.name," ",ui.lastname) as "nombreCompleto", p.category, p.created_at from posts as p 
                             left join users as u on p.autor = u.id 
                             right join userinfo as ui on u.id = ui.id
                             order by p.category desc, p.created_at desc limit 1')->getResultArray();

        $data = [
            'posts'=>$posts
        ];
    
        //dd($posts, $p,$u,$ui);
        return view('posts/ejercicio02', $data);
    }

    public function ejercicio03(){
        $db = \Config\Database::connect();
        //$u = $db->query('select * from users where id=54')->getResultArray();
        //$ui = $db->query('select * from userinfo where id=54')->getResultArray();
        //$p = $db->query('select * from posts where status =0 limit 10')->getResultArray();
        $posts = $db->query('select concat(ui.name," ",ui.lastname) as "nombreCompleto",ui.website,ui.phone, p.title, p.status from posts as p 
                             left join users as u on p.autor = u.id 
                             left join userinfo as ui on u.id = ui.id
                             where p.status=0')->getResultArray();

        $data = [
            'posts'=>$posts
        ];
    
        //dd($posts,$p,$u,$ui);        
        return view('posts/ejercicio03', $data);
    }

    public function ejercicio04(){
        $db = \Config\Database::connect();
        //$u = $db->query('select * from users where id=120')->getResultArray();
        //$ui = $db->query('select * from userinfo where id=120')->getResultArray();
        //$p = $db->query('select * from posts where created_at between "2022/01/01" and "2022/12/31" limit 10')->getResultArray();
        $posts = $db->query('select u.username, concat(ui.name," ",ui.lastname) as "nombreCompleto", 
                             ui.website, ui.gender, p.created_at from posts as p 
                             left join users as u on p.autor = u.id 
                             left join userinfo as ui on u.id = ui.id
                             where p.created_at between "2022/01/01" and "2022/12/31"')->getResultArray();

        $data = [
            'posts'=>$posts
        ];
    
        //dd($posts,$p,$u,$ui);        
        return view('posts/ejercicio04', $data);
    }

    public function ejercicio05(){
        $db = \Config\Database::connect();
        $totalUsers = $db->query('select count(*) from users')->getResult();
        $totalUsers= json_decode(json_encode($totalUsers),true);
        
        $totalPosts = $db->query('select count(*) from posts')->getResult();
        $totalPosts= json_decode(json_encode($totalPosts),true);

        $totalComments = $db->query('select count(*) from comments')->getResult();
        $totalComments= json_decode(json_encode($totalComments),true);

        $totalCategories = $db->query('select count(*) from categories')->getResult();
        $totalCategories= json_decode(json_encode($totalCategories),true);

        $data=[
            'totalUsers' => $totalUsers,
            'totalPosts' => $totalPosts,
            'totalComments' => $totalComments,
            'totalCategories' =>$totalCategories
        ];
        

        return view('posts/ejercicio05', $data);
    }

    public function ejercicio06(){
        $db = \Config\Database::connect();
        $postsPorCategoria = $db->query('select category, count(*) as "ppc" from categories 
                                        group by category')->getResultArray();
        $postPorAutor = $db->query('select username, count(*) as "ppa" from users
                                         group by username')->getResultArray();
        
        $data = [
            'postsPorCategoria' => $postsPorCategoria,
            'postPorAutor' => $postPorAutor
        ];
        
        //dd($postsPorCategoria,$postPorAutor);
        return view('posts/ejercicio06', $data);
    }

    public function ejercicio07(){
        $db = \Config\Database::connect();
        $postsMujer2022 = $db->query('select count(*) from posts as p 
                            left join users as u on p.autor = u.id
                            left join userinfo as ui on u.id = ui.id 
                            where p.created_at like "%2022%" and ui.gender = "f"')->getResultArray();
        $postsMujer2023 = $db->query('select count(*) from posts as p 
                            left join users as u on p.autor = u.id
                            left join userinfo as ui on u.id = ui.id 
                            where p.created_at like "%2023%" and ui.gender = "f"')->getResultArray();
        $postsHombre2023 = $db->query('select count(*) from posts as p 
                            left join users as u on p.autor = u.id
                            left join userinfo as ui on u.id = ui.id 
                            where p.created_at like "%2023%" and ui.gender = "m"')->getResultArray();
        $postsHombre2022 = $db->query('select count(*) from posts as p 
                            left join users as u on p.autor = u.id
                            left join userinfo as ui on u.id = ui.id 
                            where p.created_at like "%2022%" and ui.gender = "m"')->getResultArray();
        
        $data = [
            'postsHombre2022'=>$postsHombre2022,
            'postsHombre2023'=>$postsHombre2023,
            'postsMujer2023'=>$postsMujer2023,
            'postsMujer2022'=>$postsMujer2022
        ];
        //dd($postsMujer2022,$postsMujer2023,$postsHombre2022,$postsHombre2023);
        return view('posts/ejercicio07', $data);
    }

    public function ejercicio08(){
        $db = \Config\Database::connect();
        $postsPorCategoria = $db->query('select category, count(*) as "ppc" from categories 
                                        group by category order by count(*) asc')->getResultArray();
        $postPorAutor = $db->query('select username, count(*) as "ppa" from users 
                                    group by username order by count(*) asc')->getResultArray();

        $data =[
            'postsPorCategoria'=>$postsPorCategoria,
            'postPorAutor'=>$postPorAutor
        ];
 
        //dd($postsPorCategoria,$postPorAutor);
        return view('posts/ejercicio08', $data);
    }

    public function ejercicio09(){
        $db = \Config\Database::connect();
        $posts = $db->query('select p.title,p.content,c.category,pf.profile from posts as p
                            left join users as u on p.autor=u.id
                            left join profiles as pf on u.profile = pf.id
                            left join categories as c on p.category = c.id
                            order by p.title asc')->getResultArray();
        //$p=$db->query('select * from posts where autor=1 limit 20')->getResultArray();
        //$u=$db->query('select * from users limit 20')->getResultArray();
        //$pf=$db->query('select * from profiles limit 20')->getResultArray();
        //$c=$db->query('select * from categories limit 20')->getResultArray();

        $data=[
            'posts'=>$posts
        ];

        //dd($posts,$p,$u,$pf,$c);
        return view('posts/ejercicio09', $data);
    }

    public function ejercicio10(){
        $db = \Config\Database::connect();
        $posts=$db->query('select id,title,content,created_at from posts')->getResultArray();
        $postsM = $db->query('select u.username, ui.gender,ui.birthday,max(p.id) as "ultimoPost"from posts as p
                            left join users as u on p.autor =u.id
                            left join userinfo as ui on u.id=ui.id
                            where ui.gender="f"and ui.birthday between "1993/01/01" and "2023/12/31" 
                            group by u.username limit 20')->getResultArray();
        $postsH = $db->query('select u.username, ui.gender,ui.birthday,min(p.id) as "primerPost"from posts as p
                            left join users as u on p.autor =u.id
                            left join userinfo as ui on u.id=ui.id
                            where ui.gender="m" and ui.birthday not between "2007/01/01" and "2023/12/31" 
                            group by u.username limit 20')->getResultArray();
        //$p=$db->query('select * from posts where autor=120 order by id asc')->getResultArray();
        //$u=$db->query('select * from users order by username asc limit 20')->getResultArray();
        //$ui=$db->query('select * from userinfo limit 1000')->getResultArray();
        
        $data=[
            'posts'=>$posts,
            'postsM'=>$postsM,
            'postsH'=>$postsH
        ];
        //dd($posts,$postsM,$postsH);
        return view('posts/ejercicio10', $data);
    }
    
}
