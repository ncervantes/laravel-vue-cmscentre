<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.0/css/bulma.min.css">
        <link rel="stylesheet" href="/css/app.css">

        <title>Laravel</title>

    </head>
    <body>
        <div class="container-fluid" id ="app">
            <div class="row">
                <div class="col-2 sidebar-right">
                    <nav id="sidebar">
                       <ul class="list-unstyled components">                          
                          <router-link tag="li" to='/affiliations' exact>
                             <a>Affiliations</a>
                          </router-link>
                          <router-link tag="li" to='/festivals' exact>
                             <a>Festivals</a>
                          </router-link>
                          <router-link tag="li" to='/disciplines' exact>
                             <a>Disciplines</a>
                          </router-link>
                          <router-link tag="li" to='/venues' exact>
                             <a>Venues</a>
                          </router-link>                          
                          <router-link tag="li" to='/camp-categories' exact>
                             <a>Camp Categories</a>
                          </router-link>
                          <router-link tag="li" to='/camps' exact>
                             <a>Camps</a>
                          </router-link>
                       </ul>
                    </nav>                    
                </div>
                <section class="col-10">
                    <div>
                       <router-view></router-view>
                    </div>
                </section>           
            </div>
        </div>      
        <script src="//cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>     
        
        <script src="/js/app.js" ></script>
    </body>
</html>
